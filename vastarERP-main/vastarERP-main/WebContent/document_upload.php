<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>出貨明細</title>
    <link href="statics\css\searchform.css" rel="stylesheet">
    <link href="menu_style.css" rel="stylesheet" type="text/css">
    <script type="text/javascript">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</head>

<body>

    <div>
        <form method="post" action="" class="form-query">

            <div class="input">
                <div>
                    <label for="Sales_place_No">銷售地點序號</label>
                    <input type="text" id="Sales_place_No" name="Sales_place_No" size="10">
                </div>

                <div>
                    <label for="Sales_place">銷售地點</label>
                    <input type="text" id="Sales_place" name="Sales_place" size="10">
                </div>

            </div>


            <div class="action">
                <div class="div-form-button">
                    <input type="button" id="confirmbutton" name="action" value="確認"></input>
                    <input type="button" id="confirmbutton" name="action" value="新增"></input>
                    <input type="button" id="confirmbutton" name="action" value="刪除"></input>

                </div>
            </div>


        </form>

    </div>
    <center>
        <table id="sales_detail_table" border="1" rules="all" cellpadding="5" cellspacing="50" style=" font-size:14px; border: 0.5px solid ; 
           border-collapse: collapse; width: 790px; ">
            <thead>
                <tr height="30" align="center">
                    <td width="20" width="100%"></td>
                    <td>掛載日期</td>
                    <td>掛載檔名</td>
                    <td>掛載路徑</td>
                    <td width="50">播放</td>
                </tr>
            </thead>
            <tbody>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">1</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start1" type="button" value="Start1"></td>


                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">2</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start2" type="button" value="Start2"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">3</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start3" type="button" value="Start3"></td>


                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">4</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start4" type="button" value="Start4"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">5</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start5" type="button" value="Start5"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">6</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start6" type="button" value="Start6"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">7</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start7" type="button" value="Start7"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">8</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start8" type="button" value="Start8"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">9</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start9" type="button" value="Start9"></td>

                </tr>
                <tr contenteditable="false">
                    <td contenteditable="false" align="center">10</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><input id="Start10" type="button" value="Start10"></td>

                </tr>
            </tbody>
        </table>
        <script type="text/javascript">
        var salestab = document.getElementById("sales_detail_table");
        console.log(salestab);
        var salestab_tbody_list = salestab.getElementsByTagName("tbody")[0].getElementsByTagName('tr');
        console.log("中間表格的每一列節點: ", salestab_tbody_list);
        for (var i = 0; i < salestab_tbody_list.length; i++) {
            //為每一列的 產品名稱欄位 添加事件
            td = salestab_tbody_list[i].getElementsByTagName('td')[8];
            td.addEventListener("click", chooseaddress, false);
            td.addEventListener("click", getClickTd, false);
            // console.log(td);
        }

        function getClickTd(e, trNo) {
            var trNo = ""; // 被點選的td編號, 並在之後用cookie存取, 方便add_product頁面使用
            target = e.target; // 點選的欄位
            console.log("target: ", target);
            childNodesLength = target.childNodes.length; // 觸發元件的子串列, 如果>0, 代表有元素
            console.log("childNodesLength: ", childNodesLength);
            trNo = target.parentNode.getElementsByTagName('td')[0].firstChild.nodeValue;
            console.log("被點選的Td節點: ", target);
            console.log("被點選的Td節點編號: ", trNo);
            document.cookie = `chooseaddressclick = ${trNo}; path=/; max-age=3600;`; // 將點選的列 給定tdClicked cookie變數

        }

        function chooseaddress() {
            window.open('order_detail_address.php', '選擇地址', type = '_self');

        }

        $(function() {
            //Assign Click event to Button.
            var el = document.getElementById('confirmbutton');
            var sales_tab = window.opener.document.getElementById("inside-sales-table");

            el.addEventListener('click', function() {
                var selected_delivery_wary = document.getElementById("deliveryway").value;
                var trClicked = getCookie("detailtrClicked");
                sales_tab.rows[trClicked].cells[6].innerHTML = selected_delivery_wary; // 產品名稱
                localStorage.setItem('Remark', selected_delivery_wary);
                orderDetailInsert();
                setTimeout(function() {
                    window.close()
                }, 400);


            });



        });

        // 銷貨憑單明細新增
        function orderDetailInsert() {
            axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
            axios.post('https://webapi.vastar.com.tw/erpapi/api/OrderDetail/Insert', {
                    UserID: 'vastar',
                    Password: 'vastar@2673',
                    Order_No: localStorage.getItem('Order_No'),
                    Item_No: localStorage.getItem('Item_No'),
                    Sales_Type: localStorage.getItem('Sales_Type'),
                    Customer_No: localStorage.getItem('Customer_No'),
                    Product_No: localStorage.getItem('Product_No'),
                    Product_Name: localStorage.getItem('Product_Name'),
                    Product_Spec: localStorage.getItem('Product_Spec'),
                    Product_Color: localStorage.getItem('Product_Color'),
                    Quantity: parseInt(localStorage.getItem('Quantity')),
                    Product_Price: parseInt(localStorage.getItem('Product_Price')),
                    TotalPrice: parseInt(localStorage.getItem('TotalPrice')),
                    Remark: localStorage.getItem('Remark')
                })
                .then((response) => {
                    console.log(response);
                    console.log(response.data.length);
                    console.log(response.data);

                    // response.data.forEach(function(value){
                    //     table.HTML = value["Customer_No"];
                    // });
                })
                .catch((error) => console.log(error));
        }

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return decodeURI(parts.pop().split(';').shift());
            //因為獲得的php setcookie()得到的cookie值, 會進行urlencode,
            // 所以return時要記的進行decode
        }

        //刪除cookie值
        function clearCookie(name) {
            setCookie(name, "", -1);
        }
        </script>
</body>

</html>