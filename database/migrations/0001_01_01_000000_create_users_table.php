<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
public function up(): void
{
    // 1. Departments (base table)
    Schema::create('departments', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->timestamps();
    });

    // 2. Users Table
    Schema::create('users', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email')->unique();
        $table->timestamp('email_verified_at')->nullable();
        $table->string('password');
        $table->enum('role', ['teacher', 'student', 'admin'])->default('student');
        $table->rememberToken();
        $table->timestamps();
    });

    // 3. Filieres (Programs/Majors)
    Schema::create('filieres', function (Blueprint $table) {
        $table->id();
        $table->foreignId('department_id')->constrained('departments')->onDelete('cascade');
        $table->string('name');
        $table->text('description')->nullable();
        $table->foreignId('chef_id')->nullable()->constrained('users')->onDelete('set null');
        $table->timestamps();
    });

    // 4. Students Table
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
        $table->foreignId('filiere_id')->constrained('filieres')->onDelete('cascade');
        $table->enum('year', ['1', '2', '3', '4']);
        $table->timestamps();
    });

    // 5. Cours Table (Courses/Subjects)
    Schema::create('cours', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->text('description')->nullable();
        $table->timestamps();
    });

    // 6. Course-Teacher Pivot Table
    Schema::create('course_teacher', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
        $table->foreignId('teacher_id')->constrained('users')->onDelete('cascade');
        $table->timestamps();
        $table->unique(['cours_id', 'teacher_id']);
    });

    // 7. Schedules Table
    Schema::create('schedules', function (Blueprint $table) {
        $table->id();
        $table->foreignId('filiere_id')->constrained('filieres')->onDelete('cascade');
        $table->enum('year', ['1', '2', '3', '4']);
        $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
        $table->enum('day_of_week', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday']);
        $table->time('start_time');
        $table->time('end_time');
        $table->string('room')->nullable();
        $table->timestamps();
    });

    // 8. QR Codes Table (now after schedules)
    Schema::create('qr_codes', function (Blueprint $table) {
        $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade');
        $table->string('qr_code');
        $table->decimal('latitude', 10, 7);
        $table->decimal('longitude', 10, 7);
        $table->timestamp('expires_at');
        $table->timestamps();
        $table->primary(['schedule_id', 'qr_code']); // Composite primary key
    });

    // 9. Attendance Table
    Schema::create('attendance', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
        $table->foreignId('teacher_id')->nullable()->constrained('users')->onDelete('set null');
        $table->date('date');
        $table->time('time');
        $table->enum('status', ['present', 'absent'])->default('absent');
        $table->text('justification')->nullable();
        $table->unique(['student_id', 'teacher_id', 'cours_id', 'date', 'time']);
        $table->timestamps();
    });

    // 10. Letter Requests Table
    Schema::create('letter_requests', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
        $table->foreignId('processed_by')->nullable()->constrained('users')->onDelete('set null');
        $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
        $table->string('academic_year', 20);
        $table->text('reason')->nullable();
        $table->string('document_path')->nullable();
        $table->timestamps();
    });

    // 11. Marks Table
    Schema::create('marks', function (Blueprint $table) {
        $table->id();
        $table->foreignId('student_id')->constrained('students')->onDelete('cascade');
        $table->foreignId('cours_id')->constrained('cours')->onDelete('cascade');
        $table->decimal('mark', 5, 2);
        $table->text('comment')->nullable();
        $table->unique(['student_id', 'cours_id']);
        $table->timestamps();
    });

    // 12. Password Reset Tokens
    Schema::create('password_reset_tokens', function (Blueprint $table) {
        $table->string('email')->primary();
        $table->string('token');
        $table->timestamp('created_at')->nullable();
    });

    // 13. Sessions
    Schema::create('sessions', function (Blueprint $table) {
        $table->string('id')->primary();
        $table->foreignId('user_id')->nullable()->index();
        $table->string('ip_address', 45)->nullable();
        $table->text('user_agent')->nullable();
        $table->longText('payload');
        $table->integer('last_activity')->index();
    });
}
public function down(): void
{
    Schema::dropIfExists('sessions');
    Schema::dropIfExists('password_reset_tokens');
    Schema::dropIfExists('marks');
    Schema::dropIfExists('letter_requests');
    Schema::dropIfExists('attendance');
    Schema::dropIfExists('qr_codes'); // Added
    Schema::dropIfExists('schedules');
    Schema::dropIfExists('course_teacher');
    Schema::dropIfExists('cours');
    Schema::dropIfExists('students');
    Schema::dropIfExists('filieres');
    Schema::dropIfExists('users');
    Schema::dropIfExists('departments');
}
};
