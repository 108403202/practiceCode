<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>產品名稱</title>
    <!--<link rel="stylesheet" href="statics/css/add_product.css">-->
    <!-- <script src="test.js"></script> -->
    <link href="statics\css\searchform.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- widget.js 日期相關方法, Cookie相關方法, 補0到4碼方法-->
    <script src="js\widget.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>

</head>

<body bgcolor="#E0E0E0">
    <div class="container">
        <form method="post" action="" class="form-query">
            <div class="input">
                <div>
                    <span>產品編號</span>
                    <input type="text" placeholder="Product_No" name="Product_No">
                </div>

                <div>
                    <span>產品名稱</span>
                    <input type="text" placeholder="Product_Name" name="Product_Name">
                </div>
                <div>
                    <span>模糊搜尋</span>
                    <input type="text" placeholder="FuzzySearch" name="FuzzySearch">
                </div>
                <div>
                    <span>數量</span>
                    <input type="text" value="1" id="quantity" name="quantity">
                </div>
            </div>


            <div class="action">
                <div class="div-form-button">
                    <input type="submit" name="action" value="查詢"></input>
                </div>

                <div class="div-form-button">
                    <input type="submit" name="action" value="新增"></input>
                </div>

                <div class="div-form-button">
                    <input type="submit" name="action" value="刪除"></input>
                </div>
            </div>

        </form>
        <center>
            <table id="product_data_table" border="1" rules="all" cellpadding="5" cellspacing="50" style=" font-size:14px; border: 0.5px solid ; 
            border-collapse: collapse; width: 790px; ">
                <tr bgcolor="#828282" height="30" align="center">
                    <td width='40'></td>
                    <td>產品編號</td>
                    <td>產品名稱</td>
                    <td>規格</td>
                    <td>顏色</td>
                    <td>價格</td>
                </tr>
                <?php
                function httpRequest($api, $data_string)
                {
                    $ch = curl_init($api);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
                    curl_setopt(
                        $ch,
                        CURLOPT_HTTPHEADER,
                        array(
                            'Content-Type: application/json',
                            'Content-Length: ' . strlen($data_string)
                        )
                    );
                    $result = curl_exec($ch);
                    curl_close($ch);
                    return json_decode($result, true);
                }
                if (@$_POST['action'] == "確認") {
                } else if (@$_POST['action'] == "查詢") {
                    $Product_No = $_POST['Product_No'];
                    $Product_Name = $_POST['Product_Name'];
                    $FuzzySearch = $_POST['FuzzySearch'];
                    $data = [

                        "UserID" => "vastar",
                        "Password" => "vastar@2673",
                        "Product_No" => $Product_No,
                        "Product_Name" => $Product_Name,
                        "FuzzySearch" => $FuzzySearch
                    ];

                    $data = httpRequest('https://webapi.vastar.com.tw/erpapi/api/Product/List', json_encode($data));

                    if ($data[0]["Result"] == -1) {
                        $alert = $data[0]["Message"];
                        echo "<script type='text/javascript'>alert('$alert');</script>";
                    } else {
                        // $alert = $data[0]["Message"];
                        // echo "<script type='text/javascript'>alert('$alert');</script>";

                    }
                    foreach ($data as $value) { {
                            echo "<tr bgcolor='#E3E3E3'>";
                            echo "<td>" . "<input type='button' value='確認' class='btn' name='" . $value["Product_No"] . "[]'>" . "</td>";
                            echo "<td  align='center' >" . $value["Product_No"] .  "</td>";
                            echo "<td  align='center' >" . $value["Product_Name"] .  "</td>";
                            echo "<td  align='center' >" . $value["Product_Spec"] .  "</td>";
                            echo "<td  align='center' >" . $value["Product_Color"] .  "</td>";
                            echo "<td  align='center' >" . $value["Product_Price"] .  "</td>";
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
    </div>


    <script type="text/javascript">
    $(function() {
        var el = document.querySelectorAll('.btn');
        el.forEach(function(button) { // 給每個確認按鈕添加方法
            button.addEventListener('click', function() {
                let index = $(this).closest('tr').index();
                const table = document.getElementById('product_data_table');

                // 在這邊插入如以下方法index:按確認button時獲取的index
                // window.opener.document.getElementById('approve').value = table.rows[
                //     index].cells[2].innerHTML;


                const sales_tab = window.opener.document.getElementById("inside-sales-table");
                let rows = sales_tab.rows.length; // rows 儲存sales_order_php(銷貨單頁面)的銷貨單列數
                console.log("銷貨單列數:" + rows);

                // 獲取上個頁面的td cookie值
                // 其實就是被修改的列
                let trClicked = getCookie("trClicked");
                

                    
                //有資料就不做處理, 讓迴圈接著跑下去
                // donothing
                // console.log(i);
                // alert(window.opener.document.getElementById('inside-sales-table').rows[i].cells[1].innerHTML);
                // 如果是點選要修改的列

                localStorage.setItem('Item_No', addZeroToFour(trClicked)); // 將 項目編號 儲存到localStorage, 但記得前面要補0
                localStorage.setItem('Product_No', table.rows[index].cells[1].innerHTML); // 將 產品編號 儲存到localStorage
                localStorage.setItem('Product_Name', table.rows[index].cells[2].innerHTML); // 將 產品名稱 儲存到localStorage
                localStorage.setItem('Product_Spec', table.rows[index].cells[3].innerHTML); // 將 產品規格 儲存到localStorage
                localStorage.setItem('Product_Color', table.rows[index].cells[4].innerHTML); // 將 顏色 儲存到localStorage

                let select = sales_tab.rows[trClicked].cells[5].childNodes[1] ;
                let sel_index = select.selectedIndex;
                let value = select.options[sel_index].value
                
                localStorage.setItem('Sales_Type', value); // 將銷售別 儲存到localStorage

                sales_tab.rows[trClicked].cells[1].innerHTML = table.rows[index].cells[2].innerHTML; // 將產品名稱填入到銷貨單頁面

                let el_qun = document.getElementById('quantity'); // 數量節點
                let qun = parseInt(el_qun.value);
                localStorage.setItem('Quantity', qun); // 將數量儲存到localStorage
                sales_tab.rows[trClicked].cells[2].innerHTML = qun; // 將數量填入到銷貨單頁面

                let price = parseInt(table.rows[index].cells[5].innerHTML); // 這邊要記得設定邏輯判斷輸入的是數字
                localStorage.setItem('Product_Price', price); // 將 價格(單價) 儲存到localStorage
                sales_tab.rows[trClicked].cells[3].innerHTML = price; // 單價

                let total_price = qun * price;
                localStorage.setItem('TotalPrice', total_price); // 將 價格(單價) 儲存到localStorage
                sales_tab.rows[trClicked].cells[4].innerHTML = total_price; //金額 = 數量 * 單價
                // alert(window.opener.document.getElementById('inside-sales-table').rows[i].cells[1].innerHTML);

                
                    
                // 計算總金額後填入銷貨單頁面的總金額欄位
                let lump_Sum = 0;
                for (let i = 1; i < rows; i++) {
                    // 每次按確認後都要將目前銷貨單有的金額全部加起來,
                    if (sales_tab.rows[i].cells[4].innerHTML && (sales_tab.rows[i].cells[4]
                            .innerHTML !== "")) {
                        let sum = sales_tab.rows[i].cells[4].innerHTML;
                        console.log(typeof(parseInt(sum)), sum);
                        sum = parseInt(sum);
                        lump_Sum += sum;
                        console.log(lump_Sum);
                    }
                }
                
                var lumpSumPosition = window.opener.document.getElementById('lumpSum');
                console.log(lumpSumPosition);
                lumpSumPosition.value = lump_Sum;



                // Display selected Row data in Alert Box.
                // alert(message);


                window.close();

                // return false;
            });
        })
    });

    // 把項目編號補0, 補到總共4碼
    function addZeroToFour(n){
        let nNew = n.toString();
        while(nNew.length < 4){
            nNew = "0" + nNew ;
        }
        return nNew;
    }
    </script>

</body>

</html>