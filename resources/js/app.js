import 'flowbite';
import './lucide';

import $ from 'jquery';
import Swal from 'sweetalert2'
import { DataTable } from 'simple-datatables';

window.Swal = Swal
window.DataTable = DataTable
window.jQuery = window.$ = $;
