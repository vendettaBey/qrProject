/**
 * Restoran QR Menü - Ana JavaScript Dosyası
 */

document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const toggleBtn = document.querySelector('.toggle-btn');
    const closeBtn = document.querySelector('.close-menu');
    const mobileMenu = document.querySelector('.mobile-menu');
    
    if (toggleBtn && closeBtn && mobileMenu) {
        toggleBtn.addEventListener('click', function() {
            mobileMenu.classList.add('active');
        });
        
        closeBtn.addEventListener('click', function() {
            mobileMenu.classList.remove('active');
        });
    }
    
    // Smooth Scroll for Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                window.scrollTo({
                    top: targetElement.offsetTop - 100,
                    behavior: 'smooth'
                });
                
                // Close mobile menu if open
                if (mobileMenu) {
                    mobileMenu.classList.remove('active');
                }
            }
        });
    });
    
    // Add active class to current menu item
    const currentLocation = location.pathname;
    const navMenuItems = document.querySelectorAll('.main-menu a');
    const mobileMenuItems = document.querySelectorAll('.mobile-menu a');
    
    if (navMenuItems) {
        navMenuItems.forEach(item => {
            if (item.getAttribute('href') === currentLocation) {
                item.classList.add('active');
            }
        });
    }
    
    if (mobileMenuItems) {
        mobileMenuItems.forEach(item => {
            if (item.getAttribute('href') === currentLocation) {
                item.classList.add('active');
            }
        });
    }
    
    // Menu Filtering Animation
    const menuItemElements = document.querySelectorAll('.menu-item');
    const filterButtons = document.querySelectorAll('.menu-tabs .nav-link');
    
    if (filterButtons && menuItemElements) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Add a slight animation when switching tabs
                menuItemElements.forEach(item => {
                    item.style.opacity = '0';
                    setTimeout(() => {
                        item.style.opacity = '1';
                    }, 300);
                });
            });
        });
    }
}); 