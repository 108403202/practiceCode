<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <!-- <link href="menu_style.css" rel="stylesheet" type="text/css"> -->
    <title>承購人選單</title>
    <link href="statics\css\searchform.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script type='text/javascript'>
    window.onload = function() {
        let searchvalue = window.opener.document.getElementById('purchasenameid').value.length
        let table = document.getElementById("purchaser_data_table");
        let rowCount = table.rows.length;
        if (rowCount == 1 && searchvalue != 0) {
            axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
            axios.post('https://webapi.vastar.com.tw/erpapi/api/Customer/List', {
                    UserID: 'vastar',
                    Password: 'vastar@2673',
                    Staff_No: '',
                    Name: '',
                    FuzzySearch: window.opener.document.getElementById('purchasenameid').value,
                    User_No: getCookie("User_No")
                })
                .then((response) => {

                    console.log(response);
                    console.log(response.data.length);
                    console.log(response.data)
                    if (response.data[0]["Result"] == 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            var element = document.createElement("input");
                            element.type = "button";
                            element.value = "確認";
                            element.addEventListener('click', function handleClick(event) {
                                var index = $(this).closest('tr').index();
                                var table = document.getElementById('purchaser_data_table');
                                window.opener.document.getElementById('purchasenameid').value = table
                                    .rows[
                                        index].cells[2].innerHTML;
                                window.opener.document.getElementById('purchasephoneid').value = table
                                    .rows[
                                        index].cells[3].innerHTML;
                                window.opener.document.getElementById('receivenameid').value = table
                                    .rows[
                                        index].cells[2].innerHTML;
                                window.close();
                            });
                            rowCount = table.rows.length;
                            var row = table.insertRow(rowCount);
                            row.insertCell(0).appendChild(element);

                            row.insertCell(1).innerHTML = response.data[i]["Customer_No"];
                            row.insertCell(2).innerHTML = response.data[i]["Name"];
                            row.insertCell(3).innerHTML = response.data[i]["Phone_No"];
                            row.insertCell(4).innerHTML = response.data[i]["Mobile_Phone_No_1"];
                            row.insertCell(5).innerHTML = response.data[i]["Mobile_Phone_No_2"];
                            row.insertCell(6).innerHTML = response.data[i]["City"] + response.data[i][
                                "District"
                            ] + response.data[i]["Address"];

                        }
                    }
                    // response.data.forEach(function(value){
                    //     table.HTML = value["Customer_No"];
                    // });
                })
                .catch((error) => console.log(error));
        }
    }

    function receiverNoSelect() {
        // 呼叫api/Receiver/List
        // 選取 跟承購人編號 相同的 收貨人編號
        let Customer_No = localStorage.getItem('Customer_No');
        console.log('獲得承購人編號(CustomerNo): ', Customer_No);

        axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
        axios.post('https://webapi.vastar.com.tw/erpapi/api/Customer/List', {
                UserID: 'vastar',
                Password: 'vastar@2673',
                Staff_No: '',
                Name: '',
                FuzzySearch: window.opener.document.getElementById('purchasenameid').value,
                User_No: getCookie("User_No")
            })
            .then((response) => {

                console.log(response);
                console.log(response.data.length);
                console.log(response.data)
                if (response.data[0]["Result"] == 0) {
                    for (var i = 0; i < response.data.length; i++) {
                        var element = document.createElement("input");
                        element.type = "button";
                        element.value = "確認";
                        // element.setAttribute('class', 'btn');
                        element.addEventListener('click', function handleClick(event) {
                            var index = $(this).closest('tr').index();
                            var table = document.getElementById('purchaser_data_table');
                            window.opener.document.getElementById('purchasenameid').value = table
                                .rows[
                                    index].cells[2].innerHTML;
                            window.opener.document.getElementById('purchasephoneid').value = table
                                .rows[
                                    index].cells[3].innerHTML;
                            window.opener.document.getElementById('receivenameid').value = table
                                .rows[
                                    index].cells[2].innerHTML;
                            window.close();
                        });
                        rowCount = table.rows.length;
                        var row = table.insertRow(rowCount);
                        row.insertCell(0).appendChild(element);

                        row.insertCell(1).innerHTML = response.data[i]["Customer_No"];
                        row.insertCell(2).innerHTML = response.data[i]["Name"];
                        row.insertCell(3).innerHTML = response.data[i]["Phone_No"];
                        row.insertCell(4).innerHTML = response.data[i]["Mobile_Phone_No_1"];
                        row.insertCell(5).innerHTML = response.data[i]["Mobile_Phone_No_2"];
                        row.insertCell(6).innerHTML = response.data[i]["City"] + response.data[i][
                            "District"
                        ] + response.data[i]["Address"];

                    }
                }
                // response.data.forEach(function(value){
                //     table.HTML = value["Customer_No"];
                // });
            })
            .catch((error) => console.log(error));
    }
    }

    function receiverNoSelect() {
        // 呼叫api/Receiver/List
        // 選取 跟承購人編號 相同的 收貨人編號
        let Customer_No = localStorage.getItem('Customer_No');
        console.log('獲得承購人編號(CustomerNo): ', Customer_No);

        axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
        axios.post('https://webapi.vastar.com.tw/erpapi/api/Receiver/List', {
                UserID: 'vastar',
                Password: 'vastar@2673',
                CustomerNo: Customer_No
            })
            .then((response) => {
                console.log(response);
                console.log(response.data.length);
                console.log(response.data);
                // 之後會有預設為收貨人的編號, 目前就先拿第一個資料當作收貨人編號
                if (response.data.length >= 1) {
                    // 把收貨人編號存到localStorage
                    localStorage.setItem('Receiver_No', response.data[0].Receiver_No);

                    // 把收貨人的姓名填寫到銷貨單頁面
                    window.opener.document.getElementById('receivenameid').value = response.data[0]
                        .Receiver_Name; // 收貨人姓名

                } else {
                    console.log("No value");
                }
            })
            .catch((error) => console.log(error));
    }
    </script>
</head>

<body bgcolor="#eff2e4">


    <div>
        <form method="post" action="" class="form-query">

            <div class="input">
                <div>
                    <label for="Counter_No">編號</label>
                    <input type="text" id="Counter_No" name="Counter_No" size="10">
                </div>

                <div>
                    <label for="Counter_Name">名稱</label>
                    <input type="text" id="Counter_Name" name="Counter_Name" size="10">
                </div>
                <div>
                    <label for="FuzzySearch">模糊收尋</label>
                    <input type="text" id="FuzzySearch" name="FuzzySearch" size="10">
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


    </div>
    <center>
        <table id="purchaser_data_table" border="1" rules="all" cellpadding="5" cellspacing="50" style=" font-size:14px; border: 0.5px solid ; 
            border-collapse: collapse; width: 1200px; ">
            <tr bgcolor="#828282" height="30" align="center">
                <td width="40"></td>
                <td>承購人代號</td>
                <td>承購人名稱</td>
                <td>住家電話</td>
                <td>手機1</td>
                <td>手機2</td>
                <td>地址</td>
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

            function showdata($data)
            {
                if ($data[0]["Result"] == -1) {
                } elseif ($data[0]["Result"] == 0) {
                    foreach ($data as $value) { {
                            echo "<tr bgcolor='#E3E3E3'>";
                            echo "<td  align='center'>" . "<input type='button' class='btn' value='確認'  name='" . $value["Customer_No"] . "[]' >" . "</td>";
                            echo "<td  align='center' >" . $value["Customer_No"] .  "</td>";
                            echo "<td  align='center'>" . $value["Name"] .  "</td>";
                            echo "<td  align='center'>" . $value["Phone_No"] .  "</td>";
                            echo "<td  align='center' >" . $value["Mobile_Phone_No_1"] .  "</td>";
                            echo "<td  align='center'>" . $value["Mobile_Phone_No_2"] .  "</td>";
                            echo "<td  align='center' >" . $value["City"] . $value["District"] . $value["Address"] .  "</td>";
                            echo "</tr>";
                        }
                    }
                }
            }



            if (@$_POST['action'] == "查詢") {
                $Counter_No = $_POST['Counter_No'];
                $Counter_Name = $_POST['Counter_Name'];
                $FuzzySearch = $_POST['FuzzySearch'];
                $User_No = $_COOKIE["User_No"];
                $data = [
                    "UserID" => "vastar",
                    "Password" => "vastar@2673",
                    "Conuter_No" => $Counter_No,
                    "Name" => $Counter_Name,
                    "FuzzySearch" => $FuzzySearch,
                    "User_No" => $User_No

                ];
                $data = httpRequest('https://webapi.vastar.com.tw/erpapi/api/Customer/List', json_encode($data));
                showdata($data);
            }


            ?>
        </table>
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js">
        </script>
        <script type="text/javascript">
        $(function() {
            //Assign Click event to Button.
            // 按下確認後, 把值填到表格中
            var el = document.querySelectorAll('.btn');
            el.forEach(function(button) {
                button.addEventListener('click', function() {
                    var index = $(this).closest('tr').index();
                    var table = document.getElementById('purchaser_data_table');
                    window.opener.document.getElementById('receivenameid').value = table.rows[
                        index].cells[2].innerHTML;
                    window.opener.document.getElementById('purchasenameid').value = table.rows[
                        index].cells[2].innerHTML; // 承購人姓名
                    window.opener.document.getElementById('purchasephoneid').value = table.rows[
                        index].cells[3].innerHTML; // 承購人電話

                    // window.opener.document.getElementById('receivenameid').value = table.rows[
                    //     index].cells[2].innerHTML; // 收貨人姓名

                    // 將承購人代號儲存在localStorage
                    localStorage.setItem('Customer_No', table.rows[index].cells[1].innerHTML);

                    // 呼叫receiverNoSelect() 將收貨人編號儲存到localStorage
                    receiverNoSelect();

                    // 因為會來不及把收貨人編號儲存到localStorage, 所以呼叫setTimeout函數讓頁面晚點關閉
                    // 目前想法是function receiverNoSelect 的 post請求發出之後, 
                    // window.close()方法就會被呼叫, 
                    setTimeout(function() {
                        window.close();
                    }, 400);


                });
            })

            // $("#btnGet").click(function() {
            //     alert("fdlfjdslfa");
            //     var name = ""
            //     var phone = ""
            //     //Loop through all checked CheckBoxes in GridView.
            //     $("#purchaser_data_table input[type=checkbox]:checked:first").each(function() {
            //         var row = $(this).closest("tr")[0];
            //         name += row.cells[2].innerHTML;
            //         phone += row.cells[3].innerHTML;
            //     });
            //     window.opener.document.getElementById('purchasenameid').value = name;
            //     window.opener.document.getElementById('purchasephoneid').value = phone;
            //     window.close();
            //     return false;
            // });
        });

        function getCookie(name) {
            const value = `; ${document.cookie}`;
            const parts = value.split(`; ${name}=`);
            if (parts.length === 2) return decodeURI(parts.pop().split(';').shift());
            //因為獲得的php setcookie()得到的cookie值, 會進行urlencode,
            // 所以return時要記的進行decode
        }
        </script>

</body>

</html>