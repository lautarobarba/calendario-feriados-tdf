(function ($) {
  "use strict";

  $(window).load(() => {
    MicroModal.init();

    // // Setup dataTable
    // let dataTable = new DataTable("#feriados_table", {
    //   // ajax: "/api/list-feriados",
    //   responsive: true,
    //   language: {
    //     search: "Buscar&nbsp;:",
    //     lengthMenu: "Número de elementos por página _MENU_ ",
    //     // info: "Affichage de l'&eacute;lement _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
    //     infoEmpty: "No se encontraron feriados.",
    //     // infoFiltered:
    //     //   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
    //     infoPostFix: "",
    //     loadingRecords: "Buscando...",
    //     zeroRecords: "Aucun &eacute;l&eacute;ment &agrave; afficher",
    //     emptyTable: "No se encontraron feriados.",
    //     paginate: {
    //       first: "Primera",
    //       previous: "Anterior",
    //       next: "Siguiente",
    //       last: "Última",
    //     },
    //     // aria: {
    //     //   sortAscending: ": activer pour trier la colonne par ordre croissant",
    //     //   sortDescending:
    //     //     ": activer pour trier la colonne par ordre décroissant",
    //     // },
    //   },
    // });
    // // Setup create form
    // $("#test-button").click(() => {
    //   // console.log({
    //   //   __ajax_url: feriado_calendario_global.ajax_url,
    //   //   _ajax_nonce: feriado_calendario_global.nonce, // nonce
    //   //   action: "calendario_feriado_tdf_create_feriado", // action
    //   //   name: "lautaro",
    //   //   apellido: "barba",
    //   // });
    //   $.post(
    //     feriado_calendario_global.ajax_url,
    //     {
    //       //POST request
    //       _ajax_nonce: feriado_calendario_global.nonce, // nonce
    //       action: "calendario_feriado_tdf_create_feriado", //action
    //       //data
    //       name: "lautaro",
    //       apellido: "barba",
    //     },
    //     function (data) {
    //       console.log("The server responded: ", data);
    //     }
    //   );
    // });
  });
})(jQuery);
