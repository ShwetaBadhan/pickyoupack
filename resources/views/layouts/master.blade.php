<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PickYourPack — Premium Packaging for eCommerce India</title>
    <link rel="icon" type="image/x-icon" href="assets/imgs/fevicon.png" />

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
  console.log('DOM loaded successfully'); // Debug
  
  const form = document.getElementById('quoteForm');
  const submitBtn = document.getElementById('submitBtn');
  const btnText = submitBtn?.querySelector('.btn-text');
  const spinner = submitBtn?.querySelector('.spinner');
  
  if (!form) {
    console.error('❌ Form not found!');
    return;
  }
  
  if (typeof Swal === 'undefined') {
    console.error('❌ SweetAlert2 not loaded!');
  } else {
    console.log('✅ SweetAlert2 loaded');
  }

  form.addEventListener('submit', function(e) {
    e.preventDefault();
    
    console.log('🚀 Form submitted!');
    
    // Disable button and show spinner
    if (submitBtn) {
      submitBtn.disabled = true;
      if (btnText) btnText.classList.add('d-none');
      if (spinner) spinner.classList.remove('d-none');
    }
    
    const formData = new FormData(form);
    const url = '{{ route("quote.submit") }}';
    
    console.log('📤 Submitting to:', url);
    console.log('📋 Form data:', Object.fromEntries(formData));

    fetch(url, {
      method: 'POST',
      body: formData,
      headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '{{ csrf_token() }}',
        'Accept': 'application/json',
        'X-Requested-With': 'XMLHttpRequest'
      }
    })
    .then(async response => {
      console.log('📥 Response status:', response.status);
      
      const text = await response.text();
      console.log('📄 Raw response:', text);
      
      try {
        const data = JSON.parse(text);
        console.log('✅ Parsed data:', data);
        return { response, data };
      } catch (e) {
        console.error('❌ JSON parse error:', e);
        throw new Error('Invalid JSON response');
      }
    })
    .then(({ response, data }) => {
      // Reset button
      if (submitBtn) {
        submitBtn.disabled = false;
        if (btnText) btnText.classList.remove('d-none');
        if (spinner) spinner.classList.add('d-none');
      }

      if (data.success) {
        console.log('✅ Success!');
        
        if (typeof Swal !== 'undefined') {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: data.message || 'Quote request submitted successfully!',
            confirmButtonColor: '#d4a017',
            timer: 3000,
            timerProgressBar: true
          });
        } else {
          alert(data.message || 'Success!');
        }
        
        form.reset();
      } else {
        console.log('❌ Error:', data.message);
        
        if (typeof Swal !== 'undefined') {
          Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: data.message || 'Something went wrong',
            confirmButtonColor: '#d4a017'
          });
        } else {
          alert(data.message || 'Error!');
        }
      }
    })
    .catch(error => {
      console.error('❌ Fetch error:', error);
      
      // Reset button
      if (submitBtn) {
        submitBtn.disabled = false;
        if (btnText) btnText.classList.remove('d-none');
        if (spinner) spinner.classList.add('d-none');
      }
      
      if (typeof Swal !== 'undefined') {
        Swal.fire({
          icon: 'error',
          title: 'Network Error!',
          text: error.message || 'Please check console for details',
          confirmButtonColor: '#d4a017'
        });
      } else {
        alert('Error: ' + error.message);
      }
    });
  });
});
</script>
</body>
</html>