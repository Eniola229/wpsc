<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicon -->
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">

  <title>WPSC - Admin</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

  <!-- Nucleo Icons -->
  <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('assets/css/soft-ui-dashboard.css?v=1.0.7') }}" rel="stylesheet">

  <!-- Nepcha Analytics -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-100">
@include('components.admin-sidenav')
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    @include('components.admin-nav')
    <!-- End Navbar -->
    <div class="container-fluid py-4">

	    @if(session('message'))
	        <div class="alert alert-success" style="color: white;">
	            {{ session('message') }}
	        </div>
      @endif

    	@if(session()->has('error') || session()->has('errors'))
        <div class="alert alert-danger" style="color: white; background-color: #dc2626; padding: 16px; border-radius: 8px;">
            @if(session('error'))
                {{ session('error') }}
            @elseif(session('errors')->any())
                <ul>
                    @foreach(session('errors')->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </div>
    @endif


         <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-12 col-7">
                   <div class="d-flex flex-column flex-md-row align-items-center justify-content-between rounded gap-3">
                    <h2 class="h5 text-dark mb-0">Sermons</h2>
                  </div>
                
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                    <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-ellipsis-v text-secondary"></i>
                    </a>
                    <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a></li>
                      <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else here</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body px-0 pb-2">
              <div class="table-responsive">
                <div class="relative h-64">
                    <!-- Your other content here -->
                  <div class="fixed bottom-0 left-0 m-4">
                      <button class="btn btn-success" onclick="toggleUploadForm()">Add Sermons</button>
                  </div>
                     <!-- Modal to Upload Audio -->
                <div id="uploadModal" style="display: none; position: fixed; inset: 0; background-color: rgba(31, 41, 55, 0.5); display: flex; justify-content: center; align-items: center; z-index: 50;">
                    <div style="background-color: white; padding: 32px; border-radius: 8px; box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); width: 100%; max-width: 500px;">
                        <h2 style="font-size: 1.5rem; font-weight: 600; margin-bottom: 24px; color: #1f2937;">Upload Audio</h2>
                        <form id="uploadForm" enctype="multipart/form-data">
                            @csrf
                            <div style="margin-bottom: 24px;">
                                <label for="title" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">Title</label>
                                <input type="text" id="title" name="title" style="margin-top: 8px; display: block; width: 100%; padding: 8px 16px; border: 1px solid #d1d5db; border-radius: 6px; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1); outline: none;" required>
                            </div>
                            <div style="margin-bottom: 24px;">
                                <label for="audio" style="display: block; font-size: 0.875rem; font-weight: 500; color: #4b5563;">Audio</label>
                                <input type="file" id="audio" name="audio" accept="audio/*" style="margin-top: 8px; display: block; width: 100%; padding: 8px 16px; border: 1px solid #d1d5db; border-radius: 6px; box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.1); outline: none;" required>
                            </div>
                            <div style="display: flex; justify-content: flex-end; gap: 16px;">
                                <button type="button" id="submitBtn" style="padding: 8px 24px; background-color: #2563eb; color: white; font-weight: 600; border-radius: 6px; border: none; cursor: pointer; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#1d4ed8';" onmouseout="this.style.backgroundColor='#2563eb';">Upload</button>
                                <button type="button" style="padding: 8px 24px; background-color: #dc2626; color: white; font-weight: 600; border-radius: 6px; border: none; cursor: pointer; transition: background-color 0.3s ease;" onmouseover="this.style.backgroundColor='#b91c1c';" onmouseout="this.style.backgroundColor='#dc2626';" onclick="toggleUploadForm()">Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>

                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Audio</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Added</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($sermons->isNotEmpty())
                    @foreach($sermons as $sermon)
                        <tr>
                          <td>                           
                            <audio controls>
                                <source src="horse.ogg" type="audio/ogg">
                                <source src="{{ $sermon->audio_url }}" type="audio/mpeg">
                              Your browser does not support the audio element.
                              </audio>
                            
                          </td>
                            <td>
                                <h6 class="mb-0 text-sm">{{ $sermon->title }}</h6>
                            </td>
                            <td>
                                <div class="d-flex px-2 py-1">
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="mb-0 text-sm">{{ $sermon->created_at->format('F j, Y g:i A') }}</h6>
                                    </div>
                                </div>
                            </td>
								            <td>
                                <button id="deleteBtn" data-id="{{ $sermon->id }}" class="btn btn-danger">Delete</button>        
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">
                            <p>No sermon available.</p>
                        </td>
                    </tr>
                @endif

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>


  </main>
<!-- Include SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Event listener for delete button
    document.getElementById('deleteBtn').addEventListener('click', async function () {
        const sermonId = this.getAttribute('data-id');
        
        // Confirm before deleting
        const isConfirmed = await Swal.fire({
            title: 'Are you sure?',
            text: 'This action cannot be undone!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel',
        });

        if (!isConfirmed.isConfirmed) return;

        // Show loading state with SweetAlert
        const loadingAlert = Swal.fire({
            title: 'Deleting...',
            text: 'Please wait while we delete the sermon.',
            icon: 'info',
            showConfirmButton: false,
            willOpen: () => {
                Swal.showLoading();
            }
        });

        try {
            // Use Laravel's route() helper to dynamically generate the URL
            const deleteUrl = `{{ route('audio.delete', ':id') }}`.replace(':id', sermonId);

            // Send delete request to backend using the dynamic URL
            const response = await fetch(deleteUrl, {
                method: 'GET', // Use GET as the route is defined as a GET request
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                }
            });

            // Parse response as JSON
            const data = await response.json();

            if (response.ok) {
                // Show success message
                await Swal.fire({
                    title: 'Deleted!',
                    text: data.message || 'The sermon was deleted successfully.',
                    icon: 'success',
                    confirmButtonText: 'Ok',
                });

                // Optionally, remove the sermon from the UI (e.g., hide the sermon or redirect)
                window.location.reload(); // Reload the page to reflect the changes
            } else {
                // Show error message
                await Swal.fire({
                    title: 'Error!',
                    text: data.message || 'An error occurred while deleting the sermon.',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                });
            }
        } catch (error) {
            // Show error message in case of unexpected failure
            await Swal.fire({
                title: 'Error!',
                text: 'An error occurred. Please try again.',
                icon: 'error',
                confirmButtonText: 'Ok',
            });
            console.error(error);
        } finally {
            // Close the loading alert once the request is done
            loadingAlert.close();
        }
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const form = document.getElementById('uploadForm');
        const submitBtn = document.getElementById('submitBtn');

        if (!form || !submitBtn) {
            console.error('Form or Submit Button not found!');
            return;
        }

        submitBtn.addEventListener('click', async function (event) {
            event.preventDefault();

            const formData = new FormData(form);

            submitBtn.disabled = true;
            submitBtn.textContent = "Uploading 0%";

            try {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route("audio.upload") }}', true);
                xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').content);

                xhr.upload.onprogress = function (event) {
                    if (event.lengthComputable) {
                        const percentComplete = Math.round((event.loaded / event.total) * 100);
                        submitBtn.textContent = `Uploading ${percentComplete}%`;
                    }
                };

                xhr.onload = function () {
                    submitBtn.disabled = false;
                    submitBtn.textContent = "Upload";

                    if (xhr.status === 200) {
                        const data = JSON.parse(xhr.responseText);
                        Swal.fire({
                            title: 'Success!',
                            text: data.message || 'Sermon uploaded successfully!',
                            icon: 'success',
                            confirmButtonText: 'Ok',
                        }).then(() => toggleUploadForm());
                      window.location.reload();
                    } else {
                        const errorData = JSON.parse(xhr.responseText);
                        Swal.fire({
                            title: 'Error!',
                            text: errorData.message || 'An error occurred while uploading the audio.',
                            icon: 'error',
                            confirmButtonText: 'Ok',
                        });
                    }
                };

                xhr.onerror = function () {
                    submitBtn.disabled = false;
                    submitBtn.textContent = "Upload";

                    Swal.fire({
                        title: 'Error!',
                        text: 'A network error occurred. Please try again.',
                        icon: 'error',
                        confirmButtonText: 'Ok',
                    });
                };

                xhr.send(formData);
            } catch (error) {
                submitBtn.disabled = false;
                submitBtn.textContent = "Upload";

                Swal.fire({
                    title: 'Error!',
                    text: 'An unexpected error occurred. Please try again.',
                    icon: 'error',
                    confirmButtonText: 'Ok',
                });
            }
        });
    });

    // Function to toggle the modal visibility
    function toggleUploadForm() {
        const modal = document.getElementById('uploadModal');
        modal.style.display = (modal.style.display === 'none' || modal.style.display === '') ? 'flex' : 'none';
    }
</script>
<script>
    function toggleUploadForm() {
        const modal = document.getElementById('uploadModal');
        // Toggle the display between 'none' and 'flex' to show or hide the modal
        if (modal.style.display === 'none' || modal.style.display === '') {
            modal.style.display = 'flex';
        } else {
            modal.style.display = 'none';
        }
    }
</script>
  <!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/soft-ui-dashboard.min.js') }}?v={{ time() }}"></script>

</body>

</html>