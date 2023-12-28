import "./bootstrap";

import Datepicker from "flowbite-datepicker/Datepicker";

const datepickerEl = document.getElementById("datepickerId");
new Datepicker(datepickerEl, {
    format: "yyyy",
    autohide: true,
    todayHighlight: true,
    pickLevel: 2,
});
