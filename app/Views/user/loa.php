<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico"/>


</head>
<body>

<br><br><br><br>
        <h2 align="center"><u>Letter of Acceptance</u> </h2><br>
                <table width="100%">
                    <tbody>
                    <tr>
                        <td width="20%">Paper Title</td>
                        <td width="10%">:</td>
                        <td width="70%">'.$b['judul'].'</td>
                    </tr>
                    <tr>
                        <td width="20%">Authors</td>
                        <td width="10%">:</td>
                        <td width="70%">'.$b['penulis'].'</td>
                    </tr>
                    <tr>
                        <td width="20%">Affiliation</td>
                        <td width="10%">:</td>
                        <td width="70%">'.$b['afiliasi'].'</td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <b>Dear Authors,</b> <br>
                <p align=""justify> 
                I am pleased to inform you that the paper you kindly submitted to the The 1st International
                 Student Conference on Engineering and Environmental Research '.date('Y',strtotime($b['submit_date'])).' (ISCEER '.date('Y',strtotime($b['submit_date'])).') has now 
                 been accepted and the first author is invited to present the paper in the conference. 
                 Your interest in ISCEER '.date('Y',strtotime($b['submit_date'])).' is very much appreciated. I look forward to meeting you at 
                 the conference
                </p>
                <br>
                <br>
                
                <table width="100%">
                    <tbody>
                    <tr>
                        <td width="33%">&nbsp;&nbsp;</td>
                        <td width="33%">&nbsp;&nbsp;</td>
                        <td width="33%">Bandung, '.$t.' <br>
                        <img src="ttdbuponi.png" width="70px" height="70px"> <br>
                        Dr. Poni Sukaesih Kurniati, S.IP., M.Si. <br>
                        Chief of The Conference
                        </td>
                    </tr>
                    </tbody>
                </table>

                
        
</body>
</html>
