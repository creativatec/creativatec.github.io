<?php
$maps = new ControladorMaps();
$res = $maps->agregarClienteMaps();
?>
<script src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
<style>
    :root {
        --building-color: #FF9800;
        --house-color: #0288D1;
        --shop-color: #7B1FA2;
        --warehouse-color: #558B2F;
    }

    /*
 * Optional: Makes the sample page fill the window.
 */
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    }



    /*
 * Always set the map height explicitly to define the size of the div element
 * that contains the map.
 */
    #map {
        height: 100%;
        width: 100%;
    }

    /*
 * Property styles in unhighlighted state.
 */
    .property {
        align-items: center;
        background-color: #FFFFFF;
        border-radius: 50%;
        color: #263238;
        display: flex;
        font-size: 14px;
        gap: 15px;
        height: 30px;
        justify-content: center;
        padding: 4px;
        position: relative;
        position: relative;
        transition: all 0.3s ease-out;
        width: 30px;
    }

    .property::after {
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        border-top: 9px solid #FFFFFF;
        content: "";
        height: 0;
        left: 50%;
        position: absolute;
        top: 95%;
        transform: translate(-50%, 0);
        transition: all 0.3s ease-out;
        width: 0;
        z-index: 1;
    }

    .property .icon {
        align-items: center;
        display: flex;
        justify-content: center;
        color: #FFFFFF;
    }

    .property .icon svg {
        height: 20px;
        width: auto;
    }

    .property .details {
        display: none;
        flex-direction: column;
        flex: 1;
    }

    .property .address {
        color: #9E9E9E;
        font-size: 10px;
        margin-bottom: 10px;
        margin-top: 5px;
    }

    .property .features {
        align-items: flex-end;
        display: flex;
        flex-direction: row;
        gap: 10px;
    }

    .property .features>div {
        align-items: center;
        background: #F5F5F5;
        border-radius: 5px;
        border: 1px solid #ccc;
        display: flex;
        font-size: 10px;
        gap: 5px;
        padding: 5px;
    }

    /*
 * Property styles in highlighted state.
 */
    .property.highlight {
        background-color: #FFFFFF;
        border-radius: 8px;
        box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.2);
        height: 80px;
        padding: 8px 15px;
        width: auto;
    }

    .property.highlight::after {
        border-top: 9px solid #FFFFFF;
    }

    .property.highlight .details {
        display: flex;
    }

    .property.highlight .icon svg {
        width: 50px;
        height: 50px;
    }

    .property .bed {
        color: #FFA000;
    }

    .property .bath {
        color: #03A9F4;
    }

    .property .size {
        color: #388E3C;
    }

    /*
 * House icon colors.
 */
    .property.highlight:has(.fa-house) .icon {
        color: var(--house-color);
    }

    .property:not(.highlight):has(.fa-house) {
        background-color: var(--house-color);
    }

    .property:not(.highlight):has(.fa-house)::after {
        border-top: 9px solid var(--house-color);
    }

    /*
 * Building icon colors.
 */
    .property.highlight:has(.fa-building) .icon {
        color: var(--building-color);
    }

    .property:not(.highlight):has(.fa-building) {
        background-color: var(--building-color);
    }

    .property:not(.highlight):has(.fa-building)::after {
        border-top: 9px solid var(--building-color);
    }

    /*
 * Warehouse icon colors.
 */
    .property.highlight:has(.fa-warehouse) .icon {
        color: var(--warehouse-color);
    }

    .property:not(.highlight):has(.fa-warehouse) {
        background-color: var(--warehouse-color);
    }

    .property:not(.highlight):has(.fa-warehouse)::after {
        border-top: 9px solid var(--warehouse-color);
    }

    /*
 * Shop icon colors.
 */
    .property.highlight:has(.fa-shop) .icon {
        color: var(--shop-color);
    }

    .property:not(.highlight):has(.fa-shop) {
        background-color: var(--shop-color);
    }

    .property:not(.highlight):has(.fa-shop)::after {
        border-top: 9px solid var(--shop-color);
    }

    <?php
    foreach ($res as $key => $value) {
    ?><?php echo "." . $value['name'] ?> {
        width: 40px;
        /* Tamaño del ícono */
        height: 40px;
        background-image: url('<?php echo $value['logo'] ?>');
        /* Ruta de la imagen */
        background-size: contain;
        /* Escala para ajustarse al tamaño */
        background-repeat: no-repeat;
        background-position: center;
    }

    <?php
    }
    ?>
</style>
<div id="map"></div>

<!-- prettier-ignore -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDZ_dlbvUgEp1DEOepAF6iYh8HXopaNbcE&callback=initMap&libraries=places&v=weekly"
    defer></script>
<script>
    async function initMap() {
        // Request needed libraries.
        const {
            Map
        } = await google.maps.importLibrary("maps");
        const {
            AdvancedMarkerElement
        } = await google.maps.importLibrary("marker");
        const center = {
            lat: 4.304492114252014,
            lng: -74.80351727338083
        };
        const map = new Map(document.getElementById("map"), {
            zoom: 15,
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
        <i aria-hidden="true" class="${property.type}" title="${property.name}"></i>
        <span class="fa-sr-only">${property.name}</span>
    </div>
    <div class="details">
        <div class="price">${property.name}</div>
        <div class="address">${property.address}</div>
        <div class="features">  
        </div>
    </div>
    `;
        return content;
    }

    const properties = [
        <?php foreach ($res as $key => $value) { ?> {
                address: "<?php echo $value['direccion'] ?>",
                name: "<?php echo $value['name'] ?>",
                type: "<?php echo $value['name'] ?>",
                position: {
                    lat: <?php echo $value['lat'] ?>,
                    lng: <?php echo $value['lng'] ?>
                },
            },
        <?php } ?>
    ];

    initMap();
</script>