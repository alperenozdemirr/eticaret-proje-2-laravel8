<table border="0" width="600" cellspacing="0" cellpadding="0" align="center">
    <tbody>
    <tr>
        <td style="padding:40px 0;border:1px solid #f2f2f2;border-radius:5px" bgcolor="#fafafa">
            <table border="0" width="480" cellspacing="0" cellpadding="0" align="center">
                <tbody>
                <tr>
                    <td style="line-height:1;color:#3c3c3c;font-size:21px;font-weight:600;font-family:'Open Sans',Helvetica,sans-serif" align="left">
                        <div><span>Sayın {{$data['name']}} Adlı Müşterimiz,</span></div>
                    </td>
                </tr>
                <tr>
                    <td height="30">&nbsp;</td>
                </tr>
                <tr>
                    <td style="line-height:1;color:#3c3c3c;font-size:18px;font-weight:600;font-family:'Open Sans',Helvetica,sans-serif" align="left">
                        <div><span>Ödeme işlemi onaylanmıştır.</span></div>
                    </td>
                </tr>
                <tr>
                    <td height="25">&nbsp;</td>
                </tr>
                <tr>
                    <td style="line-height:1.8;color:#3c3c3c;font-size:16px;font-weight:400;font-family:'Open Sans',Helvetica,sans-serif" align="left">
                        <div><span><strong>{{$data['time']}}</strong> tarihinde oluşturulan <strong>#{{$data['code']}}00</strong> numaralı faturanız için yaptığınız ödeme onaylanmıştır. Ödemeniz ve bizi tercih ettiğiniz için teşekkür ederiz.</span></div>
                    </td>
                </tr>
                <tr>
                    <td height="25">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center"><img style="display:block;line-height:0;font-size:0;border:0" src="https://ci5.googleusercontent.com/proxy/9fCkmQMDLs5RqHZr1dbEELIuxidgeyFWnjoZ_K1v1UodE_fxmm0rMmdHpYScVrIx_e28B-vRxNHm2YOiQy3234iAvZUxsQOa9jAh_L5R3TFWNOuyRuF5YVXQt3SamWmdYQ1P9QL_LrM=s0-d-e1-ft#https://www.veridyen.com/email-resources/assets/images/icons/icons8-debit-card-50.png" alt="Ödeme Yöntemi" border="0" class="CToWUd" data-bit="iit"></td>
                </tr>
                <tr>
                    <td height="25">&nbsp;</td>
                </tr>
                <tr>
                    <td style="line-height:1.8;color:#3c3c3c;font-size:16px;font-weight:400;font-family:'Open Sans',Helvetica,sans-serif" align="left">
                        <div><span> Aşağıda ödenen faturaya ait detaylı bilgiler yer almaktadır.<br><br>
<br>

------------------------------<wbr>------------------------<br>
                                Toplam Ürün Sayısı: {{$data['totalCount']}}<br>
Ara Toplam: {{$data['totalPrice']}}.00 TL<br>
0% KDV: {{$data['totalPrice']}}.00 TL<br>
Kargo Fiyatı: 0.00 TL<br>
Toplam: {{$data['totalPrice']}} TL</span></div>
                    </td>
                </tr>
                <tr>
                    <td height="25">&nbsp;</td>
                </tr>
                <tr>
                    <td style="line-height:1.8;color:#3c3c3c;font-size:16px;font-weight:400;font-family:'Open Sans',Helvetica,sans-serif" align="left">
                        <div><span> <strong>Tutar:</strong> {{$data['totalPrice']}} TL<br><strong>İşlem Numarası:</strong> #329350<br><strong>Toplam Ödenen Tutar:</strong> {{$data['totalPrice']}} TL<br><strong>Kalan Ödeme Tutarı:</strong> 0.00 TL<br><strong>Sipariş Durumu:</strong> Tedarik Ediliyor.<br></span></div>
                    </td>
                </tr>
                <tr>
                    <td height="25">&nbsp;</td>
                </tr>
                <tr>
                    <td style="line-height:1.8;color:#3c3c3c;font-size:16px;font-weight:400;font-family:'Open Sans',Helvetica,sans-serif" align="left">
                        <div><span>Ödemesini yaptığınız Ürünler Tedarik edildikten sonra kargoya iletilecektir ürünler ile birlikte faturasıda olacaktır<br>İyi Günler Dilerim..</span></div>
                    </td>
                </tr>
                <tr>
                    <td height="50">&nbsp;</td>
                </tr>
                <tr>
                    <td style="line-height:1;color:#6a6a6a;font-style:italic;font-size:14px;font-weight:400;font-family:'Open Sans',Helvetica,sans-serif" align="center">
                        <div><span>Muhasebe Departmanı</span></div>
                    </td>
                </tr>
                </tbody>
            </table>
        </td>
    </tr>
    </tbody>
</table>
