
  // FAQ Toggle - Fixed JavaScript
  document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
      const toggle = item.querySelector('.faq-toggle');
      const answer = item.querySelector('.faq-a');
      
      item.addEventListener('click', function(e) {
        // Prevent click from bubbling if clicking on answer text
        if(e.target !== toggle && e.target !== item.querySelector('.faq-q')) {
          return;
        }
        
        const isActive = item.classList.contains('active');
        
        // Close all other items
        faqItems.forEach(other => {
          if(other !== item) {
            other.classList.remove('active');
            other.querySelector('.faq-toggle').textContent = '+';
          }
        });
        
        // Toggle current item
        if(isActive) {
          item.classList.remove('active');
          toggle.textContent = '+';
        } else {
          item.classList.add('active');
          toggle.textContent = '×';
        }
      });
    });
    
    // Video placeholder click handler
    const videoPlaceholders = document.querySelectorAll('.video-placeholder');
    videoPlaceholders.forEach(placeholder => {
      placeholder.addEventListener('click', function() {
        alert('Video player would load here. Replace with actual YouTube/Vimeo embed.');
      });
    });
  });

document.addEventListener('DOMContentLoaded', function() {
  const tabButtons = document.querySelectorAll('.tab-btn');
  const tabContents = document.querySelectorAll('.tab-content');
  
  tabButtons.forEach(button => {
    button.addEventListener('click', () => {
      const targetTab = button.getAttribute('data-tab');
      
      // Remove active class from all buttons and contents
      tabButtons.forEach(btn => btn.classList.remove('active'));
      tabContents.forEach(content => content.classList.remove('active'));
      
      // Add active class to clicked button and corresponding content
      button.classList.add('active');
      document.getElementById(targetTab).classList.add('active');
    });
  });
});
