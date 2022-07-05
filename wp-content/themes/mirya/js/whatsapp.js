jQuery(document).ready(function($) {
    $('#WABoton').floatingWhatsApp({
        phone: '<?= $sqlInf[5] ?>', // Número WhatsApp Business 
        popupMessage: 'Hola 👋 ¿Cómo podemos ayudarte?', // Mensaje pop up
        message: "Hola, quisiera más información", // Mensaje por defecto
        showPopup: true, // Habilita el pop up
        headerTitle: 'WhatsApp Chat', // Título del header
        headerColor: '#25D366', // Color del header 
        buttonImage: '<img src="https://rawcdn.githack.com/rafaelbotazini/floating-whatsapp/3d18b26d5c7d430a1ab0b664f8ca6b69014aed68/whatsapp.svg" />', // Icono WhatsApp
        size: '52px', // Tamaño del icono
        //backgroundColor: '#00000', // Color de fondo del botón
        position: "right", // Posición del icono
        avatar: '../../Recursos/img/logofb.png', // URL imagen avatar
        avatarName: 'Equilibrium', // Nombre del avatar
        avatarRole: 'Soporte', // Rol del avatar
        //autoOpenTimeout: 3000,
        zIndex: '99999',
    });
});