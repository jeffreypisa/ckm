import $ from "jquery";

export function site_is_loaded() {
  $('body').addClass('loaded');
  $('.preloader-wrapper').fadeOut();
  $('.mod-foto').addClass('autoheight');
  
  

// Controleer of de div met id "afgerond" bestaat
  if ($('#afgerond').length) {
      // Verberg eerst alle divs na de eerste 6 in de div met id "afgerond"
      $('#afgerond > div:gt(5)').addClass('d-none');
  
      // Voeg een click event listener toe aan de knop met id "toonmeerafgerond"
      $('#toonmeerafgerond').on('click', function() {
          // Vind de eerstvolgende 6 verborgen divs en verwijder de d-none class
          $('#afgerond > div.d-none').slice(0, 6).removeClass('d-none');
  
          // Controleer of er nog verborgen divs zijn, zo niet, verwijder de knop
          if ($('#afgerond > div.d-none').length === 0) {
              $(this).remove();
          }
      });
  }


}