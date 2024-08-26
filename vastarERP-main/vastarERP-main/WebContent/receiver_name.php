<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>收貨人選單</title>

    <link href="statics\css\searchform.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script type='text/javascript'>
    window.onload = function() {
        var searchvalue = window.opener.document.getElementById('receivenameid').value.length;
        var table = document.getElementById("receiver_data_table");
        var rowCount = table.rows.length;
        console.log(rowCount);
        console.log(searchvalue);
        if (rowCount == 1 && searchvalue > 0) {
            axios.defaults.headers.post["Content-Type"] = "application/json;charset=utf-8";
            axios.post('https://webapi.vastar.com.tw/erpapi/api/Receiver/List', {
                    UserID: 'vastar',
                    Password: 'vastar@2673',
                    CustomerNo: window.opener.document.getElementById('receivenameid').value

                })
                .then((response) => {
                    console.log(response);
                    console.log(response.data.length);
                    console.log(response.data)
                    if (response.data[0]["Result"] == 0) {
                        for (var i = 0; i < response.data.length; i++) {
                            var element = document.createElement("input");
                            element.type = "checkbox";
                            element.name = "checkbox[]";
                            rowCount = table.rows.length;
                            var row = table.insertRow(rowCount);

                            row.insertCell(0).appendChild(element);
                            row.insertCell(1).innerHTML = response.data[i]["Receiver_No"];
                            row.insertCell(2).innerHTML = response.data[i]["Receiver_Name"];
                            row.insertCell(3).innerHTML = response.data[i]["Receiver_Tag"];
                            row.insertCell(4).innerHTML = response.data[i]["Receiver_Zip_Code"];
                            row.insertCell(5).innerHTML = response.data[i]["Receiver_Address"];
                        }
                    }
                    // response.data.forEach(function(value){
                    //     table.HTML = value["Customer_No"];
                    // });
                })
                .catch((error) => console.log(error));
        }
    }
    </script>
</head>

<body bgcolor="#E0E0E0">

    <div>
        <form method="post" action="" class="form-query">

            <div class="input">
                <div>
                    <label for="CustomerNo">編號</label>
                    <input type="text" size="10" id="CustomerNo" name="CustomerNo" required>
                </div>

                <div>
                    <label for="receiver_name">名字</label>
                    <input type="text" id="receiver_name" size="10">
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

        <table id="receiver_data_table" border="1" rules="all" cellpadding="5" cellspacing="50" style=" font-size:14px; border: 0.5px solid ; 
           border-collapse: collapse; width: 790px; ">
            <tr bgcolor="#828282" height="30" align="center">
                <td width="40"></td>
                <td>序號</td>
                <td>名稱</td>
                <td>電話</td>
                <td>手機</td>
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

            if (@$_POST["action"] == "查詢") {
                /*還沒傳的參數，在變數前面加上@就不會跳出undifined index的問題了*/
                /*$_POST抓的是name屬性*/

                $CustomerNo = $_POST["CustomerNo"];

                $data = [
                    "UserID" => "vastar",
                    "Password" => "vastar@2673",
                    "CustomerNo" => $CustomerNo
                ];

                $data = httpRequest('https://webapi.vastar.com.tw/erpapi/api/Receiver/List', json_encode($data));

                foreach ($data as $value) {
                    echo "<tr bgcolor='#E3E3E3'>";
                    echo "<td align='center'>" . "<input type='button'  class='btn' name='" . $value["Receiver_No"] . "[]' class=customerlist value = '確認'>" . "</td>";
                    echo "<td align='center'>" . $value["Receiver_No"] .  "</td>";
                    echo "<td align='center'>" . $value["Receiver_Name"] .  "</td>";
                    echo "<td align='center'>" . $value["Receiver_Phone_No"] .  "</td>";
                    echo "<td align='center' >" . $value["Receiver_Mobile_Phone_No"] .  "</td>";
                    echo "<td align='center' >" . $value["Receiver_Address"] .  "</td>";
                }
            }
            ?>
        </table>
        <script>
        < script type = "text/javascript"
        src = "https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js" >
        </script>
        <script type="text/javascript">
        $(function() {
            var el = document.querySelectorAll('.btn');
            el.forEach(function(button) {
                button.addEventListener('click', function() {
                    var index = $(this).closest('tr').index();
                    var table = document.getElementById('receiver_data_table');
                    window.opener.document.getElementById('receivenameid').value = table.rows[
                        index].cells[2].innerHTML;
                    
                    // 將收貨人代號儲存到localStorage
                    localStorage.setItem('Receiver_No', table.rows[index].cells[1].innerHTML);
                    window.close();
                });
            })
            //Assign Click event to Button.
            // $("#btnGet").click(function() {
            //     var message = "Customer_No,  Name,  Phone_No\n";
            //     var name = ""

            //     //Loop through all checked CheckBoxes in GridView.
            //     $("#receiver_data_table input[type=checkbox]:checked:first").each(function() {
            //         var row = $(this).closest("tr")[0];
            //         name += row.cells[2].innerHTML;
            //         message += row.cells[1].innerHTML;
            //         message += "   " + row.cells[2].innerHTML;
            //         message += "   " + row.cells[3].innerHTML;
            //         message += "\n";
            //     });
            //     window.opener.document.getElementById('receivenameid').value = name;


            //     //Display selected Row data in Alert Box.
            //     // alert(message);

            //     window.close();

            //     return false;
            // });
        });
        </script>
        </script>
</body>

</html>