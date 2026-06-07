<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PickYourPack — Premium Packaging for eCommerce India</title>
<meta name="description" content="Bulk corrugated boxes, courier bags, polybags, bubble wrap & custom branded packaging. Fast 24-hour dispatch. PAN India delivery.">
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Google Fonts - Traditional pairing -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Merriweather:wght@400;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
<meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>

@include('components.navbar')
@yield('content')
@include('components.footer')





<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Main JS -->
    <script src="assets/js/main.js" ></script>
  <script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.getElementById('quoteForm');
  const submitBtn = document.getElementById('submitBtn');
  
  if (!form) {
    console.error('Form not found!');
    return;
  }

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    console.log('Form submitted!'); // Debug log
    
    const formData = new FormData(form);
    const url = '{{ route("quote.submit") }}';
    
    console.log('Submitting to:', url); // Debug log

    fetch(url, {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(async response => {
      console.log('Response status:', response.status); // Debug log
      
      const data = await response.json();
      console.log('Response data:', data); // Debug log
      
      return { response, data };
    })
    .then(({ response, data }) => {
      if (data.success) {
        Swal.fire({
          icon: 'success',
          title: 'Success!',
          text: data.message,
          confirmButtonColor: '#d4a017',
          timer: 3000
        });
        form.reset();
      } else {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: data.message || 'Something went wrong',
          confirmButtonColor: '#d4a017'
        });
      }
    })
    .catch(error => {
      console.error('Fetch error:', error); // Debug log
      
      Swal.fire({
        icon: 'error',
        title: 'Network Error!',
        text: 'Please check console for details',
        confirmButtonColor: '#d4a017'
      });
    });
  });
});
</script>
</body>
</html>