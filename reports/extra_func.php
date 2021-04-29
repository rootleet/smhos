<?php
    require '../config/inc/config.reports.php';

    if(isset($_GET['pmt_inv']) && isset($_GET['pid']) && !empty($_GET['pid']))
    {


        $id = $_GET['pid'];
        //get payment details

        $payment = fetchFunc('payment', "`id` = $id" , $pdo);
        $payment_method = $payment['method'];

        $method = $_GET['pmt_inv'];


        //cash payment
        if (strtolower($payment_method) === 'cash')
        {
            $pdf = new FPDF('L','mm', 'A5');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B','10');



            $pdf->Image('../assets/icos/general/bg.png', 0, 0,'210');
            $pdf->Cell(0,5,'Company Name',0,1,'C');
            $pdf->SetFont('Arial','I','8');
            $pdf->Cell(0,5,'Accra Ghana, Post Office Box M120',0,1,'C');
            $pdf->Cell(0,5,'#6 Coca Street',0,1,'C');

            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(95,10,$payment['customer'],0,0,'L'); //customer name
            $pdf->Cell(95,10,$payment['facility'],0,1,'R'); //Facility

            //Payment Id
            $pdf->SetFont('Arial','','10');
            $pdf->Cell(95,5,'Booking ID : '.$payment['booking'],0,0,'L');
            //Payment Id


            $pdf->Cell(0,5,'Paid : GHS '.$payment['amount_paid'],0,1,'R'); //Paid Amount
            $pdf->Cell(95,5,'Timestamp : '.$payment['date_paid'].' : '.$payment['time_paid'],0,1,'L'); //Payment Id


            $pdf->Line(10, 50, 210-10, 50);//line

            $pdf->Cell(95,10,'',0,1,'L');

            $pdf->Cell(95,10,'Payment Method :	'.$payment['method'],0,0,'L'); //Payment Method
            $pdf->Cell(95,10,'Amount Owed  : GHS '.$payment['amount_owed'],0,1,'R'); //Amount owed

            $pdf->Cell(95,10,'Payment By         :	Jane Doe',0,0,'L'); //Payment By
            $pdf->Cell(95,10,'Amount Paid  :	GHS '.$payment['amount_paid'],0,1,'R'); //Amount Paid

            $pdf->Cell(95,10,'',0,0,'L'); //Payment Date
            $pdf->Cell(95,10,'Amount Balance  :	GHS '.$payment['amount_balance'],0,1,'R'); //Amount Balance

            $pdf->Cell(95,10,'',0,1,'L');
            $pdf->Cell(95,10,'',0,1,'L');

            $pdf->Cell(95,10,'',0,0,'L');
            $pdf->Cell(95,10,'Authorized By  :	'.$payment['receptionist'],0,1,'R'); //Authorized

        }

        elseif (strtolower($payment_method)  === 'mobile money')
        {
            $pdf = new FPDF('L','mm', 'A5');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B','10');



            $pdf->Image('../assets/icos/general/bg.png', 0, 0,'210');
            $pdf->Cell(0,5,'Company Name',0,1,'C');
            $pdf->SetFont('Arial','I','8');
            $pdf->Cell(0,5,'Accra Ghana, Post Office Box M120',0,1,'C');
            $pdf->Cell(0,5,'#6 Coca Street',0,1,'C');

            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(95,10,$payment['customer'],0,0,'L'); //customer name
            $pdf->Cell(95,10,$payment['facility'],0,1,'R'); //Facility

            //Payment Id
            $pdf->SetFont('Arial','','10');
            $pdf->Cell(95,5,'Booking ID : '.$payment['booking'],0,0,'L');
            //Payment Id


            $pdf->Cell(0,5,'Paid : GHS '.$payment['amount_paid'],0,1,'R'); //Paid Amount
            $pdf->Cell(95,5,'Timestamp : '.$payment['date_paid'].' : '.$payment['time_paid'],0,1,'L'); //Payment Id


            $pdf->Line(10, 50, 210-10, 50);//line

            $pdf->Cell(95,10,'',0,1,'L');

            $pdf->Cell(95,10,'Payment Method    :	'.$payment['method'],0,0,'L'); //Payment Method
            $pdf->Cell(95,10,'Amount Owed  : GHS '.$payment['amount_owed'],0,1,'R'); //Amount owed

            $pdf->Cell(95,10,'Sender Name         :	'.$payment['momo_sender'],0,0,'L'); //Payment By
            $pdf->Cell(95,10,'Amount Paid  :	GHS '.$payment['amount_paid'],0,1,'R'); //Amount Paid

            $pdf->Cell(95,10,'Payment Number   : ('.$payment['momo_carrier'].') '.$payment['momo_number'],0,0,'L'); //Payment Date
            $pdf->Cell(95,10,'Amount Balance  :	GHS '.$payment['amount_balance'],0,1,'R'); //Amount Balance

            $pdf->Cell(95,10,'',0,1,'L');
            $pdf->Cell(95,10,'',0,1,'L');

            $pdf->Cell(95,10,'',0,0,'L');
            $pdf->Cell(95,10,'Authorized By  :	'.$payment['receptionist'],0,1,'R'); //Authorized




        }

        elseif (strtolower($payment_method) === 'card')
        {

            $pdf = new FPDF('L','mm', 'A5');
            $pdf->AddPage();
            $pdf->SetFont('Arial','B','10');



            $pdf->Image('../assets/icos/general/bg.png', 0, 0,'210');
            $pdf->Cell(0,5,'Company Name',0,1,'C');
            $pdf->SetFont('Arial','I','8');
            $pdf->Cell(0,5,'Accra Ghana, Post Office Box M120',0,1,'C');
            $pdf->Cell(0,5,'#6 Coca Street',0,1,'C');

            $pdf->SetFont('Arial','B','10');
            $pdf->Cell(95,10,$payment['customer'],0,0,'L'); //customer name
            $pdf->Cell(95,10,$payment['facility'],0,1,'R'); //Facility

            //Payment Id
            $pdf->SetFont('Arial','','10');
            $pdf->Cell(95,5,'Booking ID : '.$payment['booking'],0,0,'L');
            //Payment Id


            $pdf->Cell(0,5,'Paid : GHS '.$payment['amount_paid'],0,1,'R'); //Paid Amount
            $pdf->Cell(95,5,'Timestamp : '.$payment['date_paid'].' : '.$payment['time_paid'],0,1,'L'); //Payment Id


            $pdf->Line(10, 50, 210-10, 50);//line

            $pdf->Cell(95,10,'',0,1,'L');

            $pdf->Cell(95,10,'Payment Method    :	'.$payment['method'],0,0,'L'); //Payment Method
            $pdf->Cell(95,10,'Amount Owed  : GHS '.$payment['amount_owed'],0,1,'R'); //Amount owed

            $pdf->Cell(95,10,'Card Type         :	'.$payment['card_type'],0,0,'L'); //Payment By
            $pdf->Cell(95,10,'Amount Paid  :	GHS '.$payment['amount_paid'],0,1,'R'); //Amount Paid

            $pdf->Cell(95,10,'Card Number   : xxxxxx'.substr($payment['card_number'],-4),0,0,'L'); //Payment Date
            $pdf->Cell(95,10,'Amount Balance  :	GHS '.$payment['amount_balance'],0,1,'R'); //Amount Balance

            $pdf->Cell(95,10,'',0,1,'L');
            $pdf->Cell(95,10,'',0,1,'L');

            $pdf->Cell(95,10,'',0,0,'L');
            $pdf->Cell(95,10,'Authorized By  :	'.$payment['receptionist'],0,1,'R'); //Authorized



        }

        $pdf->Output();




    }
