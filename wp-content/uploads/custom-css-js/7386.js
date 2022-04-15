<!-- start Simple Custom CSS and JS -->
<script type="text/javascript">
jQuery(document).ready(function( $ ){  // carlos-rivas
  
  
  document.querySelector('.asael-cuesta').addEventListener("click", () => { 
  	document.querySelector('.btnAsael').click();
  });
  document.querySelector('.banda-golda').addEventListener("click", () => { 
  	document.querySelector('.btnBandaGolda').click();
  });
  document.querySelector('.carlos-rivas').addEventListener("click", () => { 
    console.log('carlos-rivas...')
  	document.querySelector('.btnCarlos').click();
  });
  document.querySelector('.yembema').addEventListener("click", () => { 
    console.log('yembema...')
  	//document.querySelector('.btnBandaGolda').click();
  });
  document.querySelector('.timbiafrica').addEventListener("click", () => { 
    console.log('timbiafrica...')
  	//document.querySelector('.btnBandaGolda').click();
  });
  
  
  
  console.log('hola2...')
});</script>
<!-- end Simple Custom CSS and JS -->
