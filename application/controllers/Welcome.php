<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        // instantiate and use the dompdf class
        $dompdf = new Dompdf\Dompdf();

        $data['files'] = [
            'graph1.png',
            'graph2.png'
        ];

        // create a img
        $this->load->view('pdf/gPieChart.php', ['fileName' => $data['files'][0]], true);
        $this->load->view('pdf/gBarChart.php', ['fileName' => $data['files'][1]], true);

        // render view to pdf
        $html = $this->load->view('pdf/render.php', $data, true);

        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'landscape');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("documento.pdf", array("Attachment" => false));
    }
}
