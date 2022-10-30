<?php

function mail_template($jobs){
    $complemento="";
    foreach($jobs as $job){
        foreach($job as $data){
            $titulo = $data["titulo"];
            $empresa = $data["empresa"];
            $link = $data["link"];
            $complemento.="<tr>";
            $complemento.="<td>".$empresa."</td>";
            $complemento.="<td>".$titulo."</td>";
            $complemento.="<td style='text-align: center'><button style='height: 30px; width: 120px; border-radius: 10px; background-color: rgb(0, 234, 0); border:none; cursor: pointer; color: white; font-size: 20px;'  > <a href=".$link." style='text-decoration: none; color: white;'>Visualizar</a> </button><br>
                          </td>
                        </tr>
            ";

        }
    }
    $template_email = "<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
    <html xmlns='http://www.w3.org/1999/xhtml'>
     <head>
      <meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
      <title>Mudar Senha - HidroSystem</title>
      <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
    </head>
    <style>
        td, th {
  border: 1px solid #dddddd;

  padding: 8px;
}
    </style>
    <body style='margin: 0px; padding: 0px;'>
        <table border='0' cellpadding='0' cellspacing='0' width='100%'>
            <tr style='height: 500px;'>
                <td align='center'>
                    <img src='https://i.imgur.com/dojjjeD.jpg' style='height: 150px; width:150px;'>
                    <h1 style='font-family: sans-serif; cursor: pointer;'>CompanyJobs | + Vagas para você :)</h1>
                    <table style='font-family: Arial, Helvetica, sans-serif; border-collapse:collapse; width:700px;'>
                        <tr>
                          <th>EMPRESA</th>
                          <th>VAGA</th>
                          <th>Aplicar</th>
                        </tr>".$complemento."
                      </table> 
                      <p style='font-size: 18px; color: #01346F;'>Somos a CompanyJobs, uma instituição sem fins lucrativos <br>que oferece os melhores empregos de tecnologia para você.</p> 
                </td>
            </tr>
        </table>
    </body>
    </html>";
return $template_email;


}

?>