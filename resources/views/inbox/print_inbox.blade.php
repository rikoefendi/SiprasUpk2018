<body>

    <div class="print">
        <div class="kop">
            <div class="logo">
                <img src="../../img/smk-wikrama-1-semarang.jpg" alt="">
            </div>
            <div class="text">
                <h1>SEKOLAH MENGENGAH KEJURUAN</h1>
                <div class="alamat">
                    Jl. raya kelro suruh
                </div>
                <div class="telp-web">
                    Telp. 085786588153 &nbsp;&nbsp; Web. smkwikrama.net
                </div>
            </div>
        </div>
        <table class="bordered" id="tbl" width="100%">
           <tbody>
               <tr>
                   <td  colspan="3" align="center" id="lbr">LEMBAR DISPOSISI</td>
               </tr>
               <tr>

                   <td id="right"><strong>Tanggal Surat</strong></td>
                   <td id="left" colspan="2">: {{$inbox->mail_date}}</td>
               </tr>
               <tr>
                   <td id="right"><strong>Nomor Surat</strong></td>
                   <td id="left" colspan="2">: {{$inbox->mail_number}}</td>
               </tr>
               <tr>
                   <td id="right"><strong>Asal Surat</strong></td>
                   <td id="left" colspan="2">: {{$inbox->mail_place}}</td>
               </tr>
               <tr>
                   <td id="right"><strong>Isi Ringkas</strong></td>
                   <td id="left" colspan="2">: {{$inbox->subject}}</td>
               </tr>
               <tr>
                   <td id="right" width="18%"><strong>Diterima Tanggal</strong></td>
                   <td id="left" width="57%"style="border-right: none;">: {{$inbox->received_at}}</td>
                   <td id="left" width="25%"><strong>No. Agenda</strong> : {{$inbox->no_agenda}}</td>
               </tr>
               <tr>
               <tr class="isi">
                   <td colspan="2">
                       <strong>Isi Disposisi :</strong><br/>{{$dis->isi_disposisi}}
                       <div style="height: 50px;"></div>
                       <strong>Batas Waktu</strong> : {{$dis->batas_waktu}}<br/>
                       <strong>Sifat</strong> : {{$dis->sifat}}<br/>
                       <strong>Catatan</strong> :<br/> {{$dis->catatan}}
                       <div style="height: 25px;"></div>
                   </td>
                   <td><strong>Diteruskan Kepada</strong> : <br/>{{$inbox->mail_number}}</td>
               </tr>
               <tr id="ttd">
                   <td colspan="2"></td>
                   <td colspan="">
                       Kepala Sekolah
                       <br>
                       <br>
                       <br><br><br>
                       <br><br><br>
                       <u><b>Tamami, S.Pd.I</b></u>
                       <br>
                       Nip : -
                   </td>
               </tr>
           </tbody>

       </div>



    <style type="text/css">
    .print{
        max-width: 900px;
        margin: 0 auto;
    }
    .kop{
        width: 100%;
        height: 200px;
        border-bottom: 3px solid #000;
        margin-bottom: 10px;
    }
    .logo{
        width: 30%;
        float: left;
    }
    .text{
        text-align: center;
        width: 70%;
        float: left;
    }
       table {
           background: #fff;
           padding: 5px;
       }
       tr, td {
           border: table-cell;
           border: 1px  solid #444;
           padding-top: 15px;
           padding-bottom: 15px;
           padding-left: 15px;
       }
       tr,td {
           vertical-align: top!important;
       }
       table, tr,td{
           border-collapse: collapse;
       }
       #right {
           border-right: none !important;
       }
       #left {
           border-left: none !important;
       }
       .isi {
           height: 300px!important;
       }
       #lbr {
           font-size: 20px;
           font-weight: bold;
       }
       #ttd, td{
           border: none;
       }
    </style>
</body>
