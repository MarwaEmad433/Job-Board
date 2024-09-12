<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationSubmitted; // تأكد من إنشاء هذا الملف
use App\Models\Listing;
use App\Models\Tag;
use App\Models\User;
use App\Models\Application;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $query = Listing::query()
            ->where('is_active', true)
            ->with('tags')
            ->latest();

        if ($request->has('s')) {
            $searchQuery = trim($request->get('s'));

            $query->where(function (Builder $builder) use ($searchQuery) {
                $builder
                    ->orWhere('title', 'like', "%{$searchQuery}%")
                    ->orWhere('company', 'like', "%{$searchQuery}%")
                    ->orWhere('location', 'like', "%{$searchQuery}%");
            });
        }

        if ($request->has('tag')) {
            $tag = $request->get('tag');
            $query->whereHas('tags', function (Builder $builder) use ($tag) {
                $builder->where('slug', $tag);
            });
        }

        // إضافة التصفح
        $listings = $query->paginate(12);

        $tags = Tag::orderBy('name')->get();

        return view('listings.index', compact('listings', 'tags'));
    }

    public function show(Listing $listing, Request $request)
    {
        return view('listings.show', compact('listing'));
    }

    public function apply(Listing $listing)
    {
        return view('listings.apply', compact('listing'));
    }
    
    
    
    public function storeApplication(Request $request, Listing $listing)
    {
        // التحقق من صحة البيانات
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);
    
        // إنشاء نموذج طلب جديد
        $application = new Application($validated);
        $application->listing_id = $listing->id;
    
        // معالجة ملف السيرة الذاتية
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes');
            $application->resume = $resumePath;
        }
    
        $application->save();
    
        // إرسال بريد إلكتروني للتأكيد
        Mail::to($validated['email'])->send(new ApplicationSubmitted($application));
    
        // إعادة توجيه المستخدم إلى صفحة تأكيد
        return redirect()->route('applications.confirmation')->with('success', 'Application submitted successfully!');
    }
    
    
    

    public function create()
    {
        return view('listings.create');
    }

    public function store(Request $request)
    {
        $validationArray = [
            'title' => 'required',
            'company' => 'required',
            'logo' => 'file|nullable|max:2048',
            'location' => 'required',
            'apply_link' => 'required|url',
            'content' => 'required',
        ];

        if (!Auth::check()) {
            $validationArray = array_merge($validationArray, [
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed|min:5',
                'name' => 'required',
            ]);
        }

        $request->validate($validationArray);

        $user = Auth::user();

        if (!$user) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Auth::login($user);
        }

        $md = new \ParsedownExtra();

        $logoPath = $request->hasFile('logo') ? $request->file('logo')->store('public/app') : null;

        $listing = $user->listings()->create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . rand(1111, 9999),
            'company' => $request->company,
            'logo' => $logoPath ? basename($logoPath) : null,
            'location' => $request->location,
            'apply_link' => $request->apply_link,
            'content' => $md->text($request->input('content')),
            'is_highlighted' => $request->filled('is_highlighted'),
            'is_active' => true,
        ]);

        foreach (explode(',', $request->tags) as $requestTag) {
            $tag = Tag::firstOrCreate([
                'slug' => Str::slug(trim($requestTag)),
            ], [
                'name' => ucwords(trim($requestTag)),
            ]);

            $tag->listings()->attach($listing->id);
        }

        return redirect()->route('dashboard');
    }
}
