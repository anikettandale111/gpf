<!DOCTYPE HTML PUBLIC "-//W3C//Dtd HTML 4.0 transitional//EN">
<html>

<head>
    <style type="text/css">
        @page {
            size: 8.5in 11in;
            margin: 0.27in
        }

        P {
            margin-bottom: 0.08in;
            direction: ltr;
            widows: 2;
            orphans: 2
        }

        td {
            width: 82;
            border: 1px solid #00000a;
            padding-top: 0in;
            padding-bottom: 0in;
            padding-left: 0.08in;
            padding-right: 0.08in
        }

        th {
            width: 24;
            height: 18;
            border: 1px solid #00000a;
            padding-top: 0in;
            padding-bottom: 0in;
            padding-left: 0.08in;
            padding-right: 0.08in
        }

        tr {
            text-align: center;
        }

        p {
            text-align: justify;
            margin-bottom: 0in;
            line-height: 100%
        }

        table {
            width: 672;
            padding: 7;
            border-spacing: 0;
        }

        .print {
            display: block;
        }

        @media print {
            .print {
                display: block
            }

            .btn-print {
                display: none;
            }
        }
    </style>
</head>
<button onclick="javascript:window.print()" class="btn-print">Print</button>
<div class="print">

    <body style="border-top: 4.50pt double #00000a; border-bottom: 4.50pt double #00000a; border-left: 4.50pt double #00000a; border-right: 4.50pt double #00000a; padding-top: 0in; padding-bottom: 0.67in; padding-left: 0.67in; padding-right: 0.35in">
        <br>


        <P style="text-align: center; margin-bottom: 0in; line-height: 100%">वित्त विभाग , जिल्हा, परिषद नाशिक </P>
        <p style="text-align: center; margin-bottom: 0in; line-height: 100%">E-mail :- cafozpnashik@gmail.com TEL No:-0253-2590908</p>
        ===========================================================================================================

        <P>जा.क्र.जिपना/वित्त/भनिनि /२०२०</P>
        <P style="text-align: right;">नाशिक दिनांक :- {{date('d/m/Y',strtotime($ganratereports->created_at))}}</P>
        <P>प्रति </P>

        <P style="text-indent: 0.2in; margin-bottom: 0.14in">
            गट विकास अधिकारी
        </P>
        <P align="justify" style="text-indent: 0.2in; margin-bottom: 0.14in">
            पंचायत समिती चांदवड
        </P>
        <P align="justify" style="text-indent: 0.9in; margin-bottom: 0.14in">
            <b>
                विषय :- भविष्य निर्वाह निधी योजना (GPF)प्रदान करणेबाबत...
            </b>
        </P>

        <P align="justify" style="text-indent: 0.9in; margin-bottom: 0.14in">
            <b>
                संदर्भ :- </b> 1) महाराष्ट्र सर्वसाधार भविष्य निर्वाह निधी नियम 1998.


        </P>
        <p align="justify" style="text-indent: 0.9in; margin-bottom: 0.14in">
            2) म.शा.वित्तविभागशा.नि.क्र.सेनिवे1008/प्र.क्र.16/सेवा4/मुंबईदि.19/07/2011.
        </p>
        <p align="justify" style="text-indent: 0.9in; margin-bottom: 0.14in">
            3) शासन परिपत्रक क्र. सेनिवे /1008/प्र.क्र.16/सेवा
            मुंबई दि.28/09/2012.
        </p>
        <p align="justify" style="text-indent: 0.9in; margin-bottom: 0.14in">
            4/ आपलेकडील जा.क्र./ {{$ganratereports->c_v_letter}}
        </p>


        <!-- <p>
		<b>संदर्भ :- </b>
		<p>
		   1) महाराष्ट्र सर्वसाधार भविष्य निर्वाह निधी नियम 1998.
		</p>
		<p>
		   2) म.शा.वित्तविभागशा.नि.क्र.सेनिवे1008/प्र.क्र.16/सेवा4/मुंबईदि.19/07/2011.
		</p>
		<p>
		   3) शासन परिपत्रक क्र. सेनिवे /1008/प्र.क्र.16/सेवा
		   4/मुंबई दि.28/09/2012.
		</p>
		<p>
		   आपलेकडील जा.क्र./ {{$ganratereports->c_v_letter}}
	   </p>
	</p> -->



        <div align="justify" style="margin-bottom: 0.14in">
            <p>
                उपरोक्त संदर्भियविषयान्वये श्री /श्रीमती .<b> {{ $ganratereports->name }} </b> यांना भविष्य निर्वाह निधी योजना लेखाक्रमांक प्रदान करण्यात येत आहे.
                सदर लेखाक्रमांक महाराष्ट्र सर्वसाधारण भविष्य निर्वाह निधी नियम 1998 चे नियम 4 ते 8 च्या अटी व शर्तीच्या अधिन राहुन प्रदान करण्यांत येत आहे.
            </P>
        </div>
        <table>
            <tr>
                <th>अ .क्र </th>
                <th>कर्मचाऱ्यांचे नाव </th>
                <th> हूद्या </th>
                <th>पंचायत समिती </th>
                <th>भनिनि खाते क्रमांक </th>
            </tr>
            <tr>
                <td>{{$ganratereports->id}}</td>
                <td>{{ $ganratereports->name }}</td>
                <td>{{ $ganratereports->designation }}</td>
                <td>{{ $ganratereports->taluka }}</td>
                <td>{{ $ganratereports->b_no }}</td>
            </tr>
        </table>
        <P> भविष्य निर्वाह निधी नविन लेखा क्रमांकाबाबत आपले स्तरावरुन खालील
            प्रमाणे अटी व शर्तीनुसार कार्यवाही करणे बंधनकारक आहे.</P>
        <ol>
            <li>
                संबधित कर्मचाऱ्यास भविष्य निर्वाह निधी लेखाक्रमांक कळविण्यात यावा.
            </li>
            <li>
                समवेतचे नामनिर्देशन प्रपत्र व माहिती प्रपत्राची प्रत संबंधित
                कर्मच-याचे सेवा पुस्तकात चिकटवुन त्याची नोंद लाल शाईने सेवापुस्तकात प्रथम पृष्ठावर घेण्यात यावी
            </li>
            <li>
                लेखाक्रमांकाची नोंद कर्मचाऱ्याच्या वेतन देयक नोंदवहीमध्ये
                संबधितकर्मचाऱ्याचे नावासमोर घेण्यात यावी.
            </li>
            <li>
                संबंधित कर्मचाऱ्याचे नजिकच्या महिन्यातील वेतन देयकात भनिनिची मासिक कपात नविन लेखा क्रमांकावर त्वरीत सुरु
                करणेत यावी.
            </li>
            <li>
                महाराष्ट्र सर्वसाधारण भविष्य निर्वाह निधी नियम 1998 चे नियम 8 नुसार दरमहा भनिनि मासिक कपात करण्यात यावी.
            </li>
            <li>
                संबंधिताची प्रलंबित मासिक भनिनि कपात पुर्वलक्षी प्रभावाने
                एकरकमी वसुल करावी.
            </li>
        </ol>
        <br>
        <br>
        <P style="text-align: right">
            उप मुख्य लेखा व वित्तअधिकारी
        </P>
        <P style="text-align: right">
            जिल्हा परिषद नासिक </P>
        <P>
            समवेत:-लेखाक्रमांक प्रदान केलेले माहिती प्रपत्र व
            नामनिर्देशन नं.नं.1 मुळ प्रत.
        </P>
    </body>
    <br>

</html>

</div>
