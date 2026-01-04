<?php

namespace App\Http\Controllers\School;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Notifications\TeacherAddedToSchoolNotification;

class TeacherController extends Controller
{
    public function index()
    {
        $school = auth()->user()->school;

        // Fetch all teachers for this school
        $teachers = User::role('teacher')
            ->where('school_id', $school->id)
            ->get();

        return view('school.teachers.index', compact('teachers', 'school'));
    }

    public function create()
    {
        return view('school.teachers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string'],
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        $school = auth()->user()->school;

        // Create teacher user
        $teacher = User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
            'school_id' => $school->id,
        ]);

        // Assign teacher role
        $teacher->assignRole('teacher');

        $teacher->assignRole('teacher');

        // since you don't want teacher email verification:
        $teacher->forceFill(['email_verified_at' => now()])->save();

        $teacher->notify(new TeacherAddedToSchoolNotification(
            schoolName: $school->name ?? 'Your School',
            tempPassword: $request->password,
            loginUrl: route('login')
        ));

        return redirect()
            ->route('school.teachers.index')
            ->with('success', 'Teacher added successfully!');
    }

    public function destroy($id)
    {
        $teacher = User::findOrFail($id);

        // Prevent deleting if the user is not a teacher
        if (!$teacher->hasRole('teacher')) {
            return back()->with('error', 'This user is not a teacher.');
        }

        // Prevent deleting if teacher belongs to a different school
        if ($teacher->school_id !== auth()->user()->school_id) {
            return back()->with('error', 'You cannot remove teachers from another school.');
        }

        $teacher->delete();

        return redirect()
            ->route('school.teachers.index')
            ->with('success', 'Teacher removed successfully.');
    }

    public function edit($id)
    {
        $school = auth()->user()->school;

        $teacher = User::where('id', $id)
            ->where('school_id', $school->id)
            ->whereHas('roles', function($q) {
                $q->where('name', 'teacher');
            })
            ->firstOrFail();

        return view('school.teachers.edit', compact('teacher'));
    }

    public function updateProfile(Request $request, User $teacher)
    {
        $this->authorizeEdit($teacher);

        $validated = $request->validate(
            [
                'name'  => ['required', 'string', 'max:255'],
                'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $teacher->id],
            ],
            [
                'name.required' => 'Teacher name is required.',
                'email.required' => 'Teacher email is required.',
                'email.email' => 'Please enter a valid email.',
                'email.unique' => 'This email is already taken.',
            ]
        );

        $teacher->update($validated);

        return back()->with('success', 'Teacher details updated successfully.');
    }

    public function updatePassword(Request $request, User $teacher)
    {
        $this->authorizeEdit($teacher);

        $validated = $request->validate(
            [
                'password' => ['required', 'confirmed', 'min:6'],
            ],
            [
                'password.required' => 'Password is required.',
                'password.confirmed' => 'Passwords do not match.',
                'password.min' => 'Password must be at least 6 characters.',
            ]
        );

        // $teacher->password = $validated['password'];
        $teacher->password = Hash::make($validated['password']);
        $teacher->save();

        return back()->with('success', 'Password updated successfully.');
    }

    private function authorizeEdit(User $teacher)
    {
        $school = auth()->user()->school;

        if ($teacher->school_id !== $school->id || !$teacher->hasRole('teacher')) {
            abort(403, 'You cannot edit this teacher.');
        }
    }

}
