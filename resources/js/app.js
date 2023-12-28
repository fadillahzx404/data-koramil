import "./bootstrap";

import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;

import Datepicker from "flowbite-datepicker/Datepicker";

const datepickerEl = document.getElementById("datepickerId");
new Datepicker(datepickerEl, {
    format: "yyyy",
    autohide: true,
    todayHighlight: true,
    pickLevel: 2,
});
