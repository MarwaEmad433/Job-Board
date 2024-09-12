# Job Application Portal

## Project Overview

This project is a **Job Application Portal** where candidates can browse job listings and submit their applications. Employers can review applications, accept or reject them, and manage job postings. The project is built using **Laravel** for the backend and uses **MySQL** for the database.

---

## Features

### Candidate Features:
- **Browse Job Listings**: Candidates can view all available job listings on the platform.
- **Submit Applications**: Candidates can submit job applications for any job they are interested in.
- **View Application Status**: Candidates can view whether their application has been accepted or rejected.

### Employer Features:
- **Manage Job Listings**: Employers can create, edit, and delete job postings.
- **Review Applications**: Employers can view all applications submitted for their job listings.
- **Accept/Reject Applications**: Employers have the option to accept or reject submitted applications.

### Admin Features:
- **Admin Dashboard**: Admin can manage all job listings and user accounts.
- **User Management**: Admin can manage both employers and candidates.

---

## How It Works

### 1. **Job Listings Page**
   - Candidates can browse available job listings and view details for each job. 
   - Job details include job title, description, requirements, and application deadline.

### 2. **Application Submission**
   - Candidates can fill out an application form that includes their details, skills, and optionally upload a resume or other documents.
   - The submitted application will be stored in the database and can be reviewed by the employer.

### 3. **Employer Dashboard**
   - Employers can log in and access a dashboard that lists all the applications for their posted jobs.
   - For each application, the employer can:
     - **Accept the application**: The status will be updated to "Accepted," and an email notification is sent to the candidate.
     - **Reject the application**: The status will be updated to "Rejected," and an email notification is sent to the candidate.

### 4. **Notifications**
   - Candidates will receive email notifications when their application is accepted or rejected.

---

## Technologies Used

- **Laravel**: PHP framework for backend development.
- **MySQL**: Relational database used to store all data (job listings, applications, users).
- **Blade**: Laravel's templating engine for frontend views.
- **Bootstrap**: CSS framework for responsive design.
- **JavaScript**: Enhances interactivity in the frontend.
- **Mailtrap**: Used for testing email notifications in a development environment.

---

