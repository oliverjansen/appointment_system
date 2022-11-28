
// Get the button
      let mybutton = document.getElementById("toTop");

      // When the user scrolls down 20px from the top of the document, show the button
      window.onscroll = function() {scrollFunction()};

      function scrollFunction() {
      if (document.body.scrollTop > 600 || document.documentElement.scrollTop > 600) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
      }

      // When the user clicks on the button, scroll to the top of the document
      $(document).on('click', '#toTop',function(e){
        e.preventDefault();
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      });