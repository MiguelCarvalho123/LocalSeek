// Elementos do Historico---------------------------------------------------<
 // Perfil Dropdown
 let profileDropdownOpen = false;

 function toggleProfileDropdown() {
     const dropdown = document.getElementById('profileDropdown');
     const trigger = document.getElementById('profileTrigger');
     
     profileDropdownOpen = !profileDropdownOpen;
     
     if (profileDropdownOpen) {
         dropdown.classList.add('show');
         trigger.classList.add('active');
     } else {
         dropdown.classList.remove('show');
         trigger.classList.remove('active');
     }
 }

 // Mobile Menu
 let mobileMenuOpen = false;

 function toggleMobileMenu() {
     const navMenu = document.getElementById('navMenu');
     const mobileMenuBtn = document.getElementById('mobileMenuBtn');
     
     mobileMenuOpen = !mobileMenuOpen;
     
     if (mobileMenuOpen) {
         navMenu.classList.add('show');
         mobileMenuBtn.textContent = '✕';
     } else {
         navMenu.classList.remove('show');
         mobileMenuBtn.textContent = '☰';
     }
 }

 // Close dropdowns when clicking outside
 document.addEventListener('click', function(event) {
     const profileDropdown = document.getElementById('profileDropdown');
     const profileTrigger = document.getElementById('profileTrigger');
     const navMenu = document.getElementById('navMenu');
     const mobileMenuBtn = document.getElementById('mobileMenuBtn');

     // Close profile dropdown
     if (!profileTrigger.contains(event.target) && profileDropdownOpen) {
         profileDropdown.classList.remove('show');
         profileTrigger.classList.remove('active');
         profileDropdownOpen = false;
     }

     // Close mobile menu
     if (!navMenu.contains(event.target) && !mobileMenuBtn.contains(event.target) && mobileMenuOpen) {
         navMenu.classList.remove('show');
         mobileMenuBtn.textContent = '☰';
         mobileMenuOpen = false;
     }
 });

 // Feature functions
 function showFeature(feature) {
     console.log(`Navegando para: ${feature}`);
     alert(`Funcionalidade "${feature}" seria implementada aqui.`);
     
     // Close any open dropdowns
     if (profileDropdownOpen) {
         toggleProfileDropdown();
     }
     if (mobileMenuOpen) {
         toggleMobileMenu();
     }
 }

 function exploreDestinations() {
     console.log('Explorando destinos...');
     alert('Redirecionando para página de exploração de destinos!');
 }

 function logout() {
     if (confirm('Tem certeza que deseja sair?')) {
         console.log('Fazendo logout...');
         alert('Saindo... Redirecionando para página inicial.');
         window.location.href = "index.html"
         // Em uma aplicação real, faria logout e redirecionaria
     }
 }

 // Add smooth scrolling and animations
 document.addEventListener('DOMContentLoaded', function() {
     // Add entrance animation to main content
     const mainContent = document.querySelector('.main-content');
     mainContent.style.opacity = '0';
     mainContent.style.transform = 'translateY(20px)';
     
     setTimeout(() => {
         mainContent.style.transition = 'all 0.6s ease-out';
         mainContent.style.opacity = '1';
         mainContent.style.transform = 'translateY(0)';
     }, 100);
 });

 // Keyboard navigation support
 document.addEventListener('keydown', function(event) {
     if (event.key === 'Escape') {
         if (profileDropdownOpen) {
             toggleProfileDropdown();
         }
         if (mobileMenuOpen) {
             toggleMobileMenu();
         }
     }
 });