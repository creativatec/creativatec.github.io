
async function initMap() {
  // Request needed libraries.
  const { Map } = await google.maps.importLibrary("maps");
  const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");
  const center = { lat: 4.298744593259471, lng: -74.8066477538136 };
  const map = new Map(document.getElementById("map"), {
    zoom: 19,
    center,
    mapId: "4504f8b37365c3d0",
  });

  for (const property of properties) {
    const AdvancedMarkerElement = new google.maps.marker.AdvancedMarkerElement({
      map,
      content: buildContent(property),
      position: property.position,
      title: property.description,
    });

    AdvancedMarkerElement.addListener("click", () => {
      toggleHighlight(AdvancedMarkerElement, property);
    });
  }
}

function toggleHighlight(markerView, property) {
  if (markerView.content.classList.contains("highlight")) {
    markerView.content.classList.remove("highlight");
    markerView.zIndex = null;
  } else {
    markerView.content.classList.add("highlight");
    markerView.zIndex = 1;
  }
}

function buildContent(property) {
  const content = document.createElement("div");

  content.classList.add("property");
  content.innerHTML = `
      <div class="icon">
          <i aria-hidden="true" class="fa fa-icon fa-${property.type}" title="${property.type}"></i>
          <span class="fa-sr-only">${property.type}</span>
      </div>
      <div class="details">
          <div class="price">${property.price}</div>
          <div class="address">${property.address}</div>
          <div class="features">
          </div>
      </div>
      `;
  return content;
}

const properties = [
  {
    address: "Publicidad y Tecnologia",
    description: "Publicidad y Tecnologia",
    price: "Creativa",
    type: "building",
    position: {
      lat: 4.298744593259471,
      lng: -74.8066477538136,
    },
  },
];

initMap();

var urlActual = window.location.href;
var hosting = window.location.hostname;
if (urlActual == "https://" + hosting + "/inicio") {
  //========= glightbox
  GLightbox({
    'href': 'https://www.youtube.com/watch?v=JRpVvu3VVcM&t=1s',
    'type': 'video',
    'source': 'youtube', //vimeo, youtube or local
    'width': 900,
    'autoplayVideos': true,
  });
}

//======== Clients Logo Slider
var clientLogoContainer = document.querySelector('.client-logo-carousel');
if (clientLogoContainer) {
  tns({
    container: clientLogoContainer,
    slideBy: 'page',
    autoplay: true,
    autoplayButtonOutput: false,
    mouseDrag: true,
    gutter: 15,
    nav: false,
    controls: false,
    responsive: {
      0: {
        items: 1,
      },
      540: {
        items: 2,
      },
      768: {
        items: 3,
      },
      992: {
        items: 4,
      },
      1170: {
        items: 6,
      }
    }
  });
}

//======== Home Slider
var homeSliderContainer = document.querySelector('.home-slider');
if (homeSliderContainer) {
  var slider = new tns({
    container: homeSliderContainer,
    slideBy: 'page',
    autoplay: false,
    mouseDrag: true,
    gutter: 0,
    items: 1,
    nav: true,
    controls: false,
    controlsText: [
      '<i class="lni lni-arrow-left prev"></i>',
      '<i class="lni lni-arrow-right next"></i>'
    ],
    responsive: {
      1200: {
        items: 1,
      },
      992: {
        items: 1,
      },
      0: {
        items: 1,
      }
    }
  });
}

//======== Testimonial Slider
var testimonialSliderContainer = document.querySelector('.testimonial-slider');
if (testimonialSliderContainer) {
  var slider = new tns({
    container: testimonialSliderContainer,
    slideBy: 'page',
    autoplay: false,
    mouseDrag: true,
    gutter: 0,
    items: 1,
    nav: true,
    controls: false,
    controlsText: [
      '<i class="lni lni-arrow-left prev"></i>',
      '<i class="lni lni-arrow-right next"></i>'
    ],
    responsive: {
      1200: {
        items: 2,
      },
      992: {
        items: 1,
      },
      0: {
        items: 1,
      }
    }
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const portfolioBtns = document.querySelectorAll('.portfolio-btn');
  const portfolioItems = document.querySelectorAll('.grid-item');

  portfolioBtns.forEach(btn => {
    btn.addEventListener('click', function () {
      // Remove active class from all buttons
      portfolioBtns.forEach(button => button.classList.remove('active'));
      // Add active class to the clicked button
      btn.classList.add('active');

      const filterValue = btn.getAttribute('data-filter');

      portfolioItems.forEach(item => {
        if (filterValue === '*' || item.classList.contains(filterValue.slice(1))) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  });

  // Trigger click on the "Casa" button to show it by default
  const defaultBtn = document.querySelector('.portfolio-btn.active');
  if (defaultBtn) {
    defaultBtn.click();
  }
});
//enviar Comprobante pago
document.addEventListener('DOMContentLoaded', function () {
	const abrirModalBtn = document.getElementById('abrirModal');
	const comprobanteForm = document.getElementById('comprobanteForm');

	abrirModalBtn.addEventListener('click', function () {
		$('#caducidadModal').modal('hide');
		$('#comprobanteModal').modal('show');
	});

	comprobanteForm.addEventListener('submit', function (e) {
		e.preventDefault();

		const nombreEstablecimiento = document.getElementById('nombreEstablecimiento').value;
		const comprobantePago = document.getElementById('comprobantePago').files[0];

		if (nombreEstablecimiento && comprobantePago) {
			const formData = new FormData();
			formData.append('nombreEstablecimiento', nombreEstablecimiento);
			formData.append('comprobantePago', comprobantePago);

			fetch('views/enviarCorreo.php', {
				method: 'POST',
				body: formData
			})
			.then(response => response.text())
			.then(result => {
				alert('Comprobante enviado exitosamente.');
				$('#comprobanteModal').modal('hide');
			})
			.catch(error => {
				console.error('Error:', error);
			});
		} else {
			alert('Por favor, complete todos los campos.');
		}
	});
});