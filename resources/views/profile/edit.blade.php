{{-- resources/views/profile/edit.blade.php --}}
@extends('layouts.admin')

@section('title', 'My Profile')

@push('styles')
<style>
  .profile-avatar {
    width: 96px;
    height: 96px;
    object-fit: cover;
  }
</style>
@endpush

@section('content')
@php
  $u = $user ?? auth()->user();
  $social = is_array($u->social_links) ? $u->social_links : [];
@endphp

<div class="container-fluid">

  <div class="d-flex flex-wrap justify-content-between align-items-center mb-3">
    <div>
      <h1 class="h3 mb-1">My Profile</h1>
      <div class="text-muted small">
        Update your personal information, password, and profile photo.
      </div>
    </div>
  </div>

  {{-- Flash messages --}}
  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  @if ($errors->any())
    <div class="alert alert-danger">
      <div class="fw-semibold mb-1">Please fix the following:</div>
      <ul class="mb-0">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <input type="hidden" id="csrfToken" value="{{ csrf_token() }}">

  <div class="row g-3">

    {{-- Left: Photo card --}}
    <div class="col-12 col-lg-4">
      <div class="card shadow-sm h-100">
        <div class="card-header">
          <h5 class="mb-0">Profile Photo</h5>
        </div>

        <div class="card-body">
          <div class="d-flex align-items-center gap-3">
            <img
              src="{{ $u->profile_photo_url }}"
              alt="Profile Photo"
              class="rounded-circle border profile-avatar"
              id="profilePhotoPreview"
            >

            <div>
              <div class="fw-semibold">{{ $u->name }}</div>
              <div class="text-muted small">{{ $u->email }}</div>

              <div class="mt-2 d-flex gap-2 flex-wrap">
                <button type="button" class="btn btn-sm btn-dark" id="btnChoosePhoto">
                  Choose Photo
                </button>
              </div>

              <div class="small text-muted mt-2">
                JPG/PNG/WEBP up to 2MB
              </div>

            </div>
          </div>

          <div class="small text-muted mt-2">
            <strong>{{ $u->bio }}</strong>
          </div>

          <input type="file" id="profilePhotoInput" accept="image/*" class="d-none">

          <div id="photoUploadAlert" class="mt-3 d-none"></div>



            <div class="social-links mt-3">
                
                <div class="list-group list-group-flush">

                    @if(!empty($social['linkedin']))
                    <a href="{{ $social['linkedin'] }}" target="_blank" rel="noopener"
                        class="list-group-item p-2 list-group-item-action">
                        <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <i class="ti ti-brand-linkedin f-20"></i>
                        </div>

                        <div class="flex-grow-1 mx-3">
                            <h5 class="m-0">LinkedIn</h5>
                        </div>

                        <!-- ELLIPSIS -->
                        <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                            <small class="text-muted text-truncate d-block"
                                title="{{ $social['linkedin'] }}">
                            {{ $social['linkedin'] }}
                            </small>
                        </div>

                        </div>
                    </a>
                    @endif

                    @if(!empty($social['github']))
                    <a href="{{ $social['github'] }}" target="_blank" rel="noopener"
                        class="list-group-item p-2 list-group-item-action">
                        <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <i class="ti ti-brand-github f-20"></i>
                        </div>

                        <div class="flex-grow-1 mx-3">
                            <h5 class="m-0">GitHub</h5>
                        </div>

                        <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                            <small class="text-muted text-truncate d-block"
                                title="{{ $social['github'] }}">
                            {{ $social['github'] }}
                            </small>
                        </div>

                        </div>
                    </a>
                    @endif

                    @if(!empty($social['website']))
                    <a href="{{ $social['website'] }}" target="_blank" rel="noopener"
                        class="list-group-item p-2 list-group-item-action">
                        <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <i class="ti ti-world f-20"></i>
                        </div>

                        <div class="flex-grow-1 mx-3">
                            <h5 class="m-0">Website</h5>
                        </div>

                        <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                            <small class="text-muted text-truncate d-block"
                                title="{{ $social['website'] }}">
                            {{ $social['website'] }}
                            </small>
                        </div>

                        </div>
                    </a>
                    @endif

                    @if(!empty($social['instagram']))
                    <a href="{{ $social['instagram'] }}" target="_blank" rel="noopener"
                        class="list-group-item p-2 list-group-item-action">
                        <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <i class="ti ti-brand-instagram f-20"></i>
                        </div>

                        <div class="flex-grow-1 mx-3">
                            <h5 class="m-0">Instagram</h5>
                        </div>

                        <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                            <small class="text-muted text-truncate d-block"
                                title="{{ $social['instagram'] }}">
                            {{ $social['instagram'] }}
                            </small>
                        </div>

                        </div>
                    </a>
                    @endif

                    @if(!empty($social['facebook']))
                    <a href="{{ $social['facebook'] }}" target="_blank" rel="noopener"
                        class="list-group-item p-2 list-group-item-action">
                        <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <i class="ti ti-brand-facebook f-20"></i>
                        </div>

                        <div class="flex-grow-1 mx-3">
                            <h5 class="m-0">Facebook</h5>
                        </div>

                        <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                            <small class="text-muted text-truncate d-block"
                                title="{{ $social['facebook'] }}">
                            {{ $social['facebook'] }}
                            </small>
                        </div>

                        </div>
                    </a>
                    @endif

                    @if(!empty($social['twitter']))
                    <a href="{{ $social['twitter'] }}" target="_blank" rel="noopener"
                        class="list-group-item p-2 list-group-item-action">
                        <div class="d-flex align-items-center">

                        <div class="flex-shrink-0">
                            <i class="ti ti-brand-twitter f-20"></i>
                        </div>

                        <div class="flex-grow-1 mx-3">
                            <h5 class="m-0">X / Twitter</h5>
                        </div>

                        <div class="flex-shrink-0 text-end" style="max-width: 180px;">
                            <small class="text-muted text-truncate d-block"
                                title="{{ $social['twitter'] }}">
                            {{ $social['twitter'] }}
                            </small>
                        </div>

                        </div>
                    </a>
                    @endif

                </div>

            </div>

        </div>
      </div>
    </div>

    {{-- Right: Forms --}}
    <div class="col-12 col-lg-8">
      <div class="card shadow-sm mb-3">
        <div class="card-header">
          <h5 class="mb-0">Profile Information</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PATCH')

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $u->name) }}" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email', $u->email) }}" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control" value="{{ old('phone', $u->phone) }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">Designation</label>
                <input type="text" name="designation" class="form-control" value="{{ old('designation', $u->designation) }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">Level</label>
                <input type="text" name="level" class="form-control" value="{{ old('level', $u->level) }}" placeholder="e.g., Junior / Senior / Grade Level">
              </div>

              <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" value="{{ old('address', $u->address) }}">
              </div>

              <div class="col-12">
                <label class="form-label">Bio</label>
                <textarea name="bio" rows="4" class="form-control">{{ old('bio', $u->bio) }}</textarea>
              </div>

              <div class="col-12">
                <hr class="my-2">
                <h6 class="mb-2">Social Links</h6>
              </div>

              <div class="col-md-6">
                <label class="form-label">LinkedIn</label>
                <input type="text" name="social_links[linkedin]" class="form-control"
                       value="{{ old('social_links.linkedin', $social['linkedin'] ?? '') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">GitHub</label>
                <input type="text" name="social_links[github]" class="form-control"
                       value="{{ old('social_links.github', $social['github'] ?? '') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">Website</label>
                <input type="text" name="social_links[website]" class="form-control"
                       value="{{ old('social_links.website', $social['website'] ?? '') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">Instagram</label>
                <input type="text" name="social_links[instagram]" class="form-control"
                       value="{{ old('social_links.instagram', $social['instagram'] ?? '') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">Facebook</label>
                <input type="text" name="social_links[facebook]" class="form-control"
                       value="{{ old('social_links.facebook', $social['facebook'] ?? '') }}">
              </div>

              <div class="col-md-6">
                <label class="form-label">X / Twitter</label>
                <input type="text" name="social_links[twitter]" class="form-control"
                       value="{{ old('social_links.twitter', $social['twitter'] ?? '') }}">
              </div>

              <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-primary" type="submit">Save Profile</button>
              </div>
            </div>
          </form>
        </div>
      </div>

      {{-- Password card --}}
      <div class="card shadow-sm">
        <div class="card-header">
          <h5 class="mb-0">Change Password</h5>
        </div>

        <div class="card-body">
          <form method="POST" action="{{ route('profile.password.update') }}">
            @csrf
            @method('PATCH')

            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Current Password</label>
                <input type="password" name="current_password" class="form-control" required autocomplete="current-password">
              </div>

              <div class="col-md-6">
                <label class="form-label">New Password</label>
                <input type="password" name="password" class="form-control" required autocomplete="new-password">
              </div>

              <div class="col-md-6">
                <label class="form-label">Confirm New Password</label>
                <input type="password" name="password_confirmation" class="form-control" required autocomplete="new-password">
              </div>

              <div class="col-12 d-flex justify-content-end">
                <button class="btn btn-outline-primary" type="submit">Update Password</button>
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
(function () {
  const btnChoose = document.getElementById('btnChoosePhoto');
  const input = document.getElementById('profilePhotoInput');
  const preview = document.getElementById('profilePhotoPreview');
  const alertBox = document.getElementById('photoUploadAlert');
  const csrf = document.getElementById('csrfToken')?.value;

  function showAlert(type, message) {
    alertBox.className = 'alert alert-' + type;
    alertBox.textContent = message;
    alertBox.classList.remove('d-none');
  }

  function setUploading(isUploading) {
    btnChoose.disabled = isUploading;
    btnChoose.textContent = isUploading ? 'Uploading...' : 'Choose Photo';
  }

  btnChoose?.addEventListener('click', function () {
    input.click();
  });

  input?.addEventListener('change', async function () {
    const file = input.files && input.files[0];
    if (!file) return;

    // Instant preview
    const objectUrl = URL.createObjectURL(file);
    preview.src = objectUrl;

    // Upload immediately via AJAX
    try {
      alertBox.classList.add('d-none');
      setUploading(true);

      const fd = new FormData();
      fd.append('photo', file);

      const res = await fetch("{{ route('profile.photo.update') }}", {
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': csrf
        },
        body: fd
      });

      if (!res.ok) {
        let msg = 'Photo upload failed.';
        try {
          const data = await res.json();
          if (data?.message) msg = data.message;
        } catch (e) {}
        throw new Error(msg);
      }

      const data = await res.json();

      // Update preview to stored URL (and bust cache)
      const freshUrl = data.url + (data.url.includes('?') ? '&' : '?') + 'v=' + Date.now();
      preview.src = freshUrl;

      // Update ALL navbar/avatar images instantly
      document.querySelectorAll('.js-profile-avatar').forEach(img => {
        img.src = freshUrl;
      });

      setUploading(false);
    //   showAlert('success', 'Profile photo updated successfully.');
    } catch (err) {
      setUploading(false);
      showAlert('danger', err.message || 'Photo upload failed.');
    } finally {
      // release object URL
      try { URL.revokeObjectURL(preview.src); } catch(e) {}
    }
  });
})();
</script>
@endpush
