<?php
    require_once 'C:\wamp64\www\MVC_site\model\conn.php';

    $acao = $_GET['acao'];
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    switch ($acao){

        case 'login':

            if (count($_POST) > 0) {
                $isSuccess = 0;
                $userName = $_POST['name'];
                $sql = "SELECT * FROM log WHERE log_name= ?";
                $statement = $conn->prepare($sql);
                $statement->bind_param('s', $userName);
                $statement->execute();
                $result = $statement->get_result();
                while ($row = $result->fetch_assoc()) {
                    if (!empty($row)) {
                        $hashedPassword = $row["log_password"];
                        if (password_verify($_POST["Senha"], $hashedPassword)) {
                            $isSuccess = 1;
                        }
                    }
                }
                if ($isSuccess == 0) {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Login Autorizado!')
                    window.location.href='view/painel.php'</script>";
                } else {
                    echo "<script language='javascript' type='text/javascript'>
                    alert('Login Não Autorizado!')
                    window.location.href='view/painel.php'</script>";
                }
            }

            break;

                case 'log_insert':
        
                $nome = $_POST['name'];
                $senha = $_POST['Senha'];
                $email = $_POST['Email'];
               
                $sql = "INSERT INTO log (log_name, log_password ,log_email)
                values('$nome' ,'$senha', '$email')";
            
                if (!mysqli_query($conn,$sql)){
                die("Erro ao inserir as informações do Forms na tabela selecionada(users)". mysqli_error($conn));
                }else {
                echo "<script language='javascript' type='text/javascript'>
                alert('Dados cadastrados com sucesso!')
                window.location.href='view/index.php'</script>";
                }
                break;

                case 'log_delete':

                    $id = $_POST['log_id'];
                    $sqlDelete = "DELETE FROM log WHERE log_id = '".$id."'";
                
                    if(!mysqli_query($conn,$sqlDelete))
                    {
                    die('Error: ' . mysqli_error($conn));
                    }
                     echo "<script language='javascript' type='text/javascript'>
                        alert('Dados deletados com sucesso!')
                        window.location.href='crud.php?acao=log_select'</script>";
                        
                    break;
            
                    case 'log_montar':
 
                        $sqlMontar = 'SELECT * FROM log WHERE log_id=' . $id;
                        $resultado = mysqli_query($conn, $sqlMontar)or die("Erro ao retornar os dados");
                
                        echo "<form method='post' name='dados' action='crud.php?acao=log_atualizar' onSubmit='return enviardados();'>";
                        echo "<table width='588' border='0' align='center' >";
                
                        while ($registro = mysqli_fetch_array($resultado)) {
                            echo "<tr>";
                            echo "<td width='120'><font size='1'>Códgio:</font></td> ";
                            echo "<td width='460'>";
                            echo "<input name='id' type='text' class='formbutton' id='id' size='5' maxlength='10' value=". $id ." readonly>";
                            echo "</td>";
                            echo "</tr>"; 
                
                            echo "<tr>";
                            echo "<td width='120'><font size='1'>Nome:</font></td>";
                            echo "<td width='450'>";
                            echo "<input name='name' type='text' class='formbutton' id='id' size='5' maxlength='10' value=". $registro['log_name']. ">";
                            echo "</td>";
                            echo "</tr>";
                           
                            echo "<tr>";
                            echo "<td width='120'><font size='1'>Senha:</font></td>";
                            echo "<td width='450'>";
                            echo "<input name='senha' type='text' class='formbutton' id='id' size='5' maxlength='10' value=". $registro['log_password']. ">";
                            echo "</td>";
                            echo "</tr>";
                
                            echo "<tr>";
                            echo "<td width='120'><font size='1'>Email:</font></td>";
                            echo "<td width='450'>";
                            echo "<input name='email' type='text' class='formbutton' id='id' size='5' maxlength='10' value=". $registro ['log_email']. ">";
                            echo "</td>";
                            echo "</tr>";
                           
                         
                            echo "<tr>";
                            echo    "<tr>";
                            echo "      <td heith='22'></td>";
                            echo "         <td>";
                            echo "             <input name='Submit' type='submit' class='formobjects' value='atualizar'>";
                            echo "             <button type='submit' formaction='crud.php?acao=log_select'>Selecionar</button>";
                            echo "         </td>";
                            echo "   </tr>";
                            echo "</tr>";
                
                            echo "</table>";
                            echo "</form>";
                        }
                        mysqli_close($conn);
                    break;
            
                    case 'log_atualizar':
         
                        $id = $_POST['id'];
                        $nome = $_POST['name'];
                        $email = $_POST['email'];
                        $senha = $_POST['senha'];
                        $birth = $_POST['birth'];
                        $sala = $_POST['sala'];
                        $ident = $_POST['ident'];
                                  
                        $sqlUpdate = " UPDATE users SET user_name ='".$nome."',user_email= '".$email."',user_password='".$senha."' , user_birth='".$birth."', sala_user='".$sala."' ,ident= '".$ident."' WHERE user_id = '".$id."'";
                        
                        if (!mysqli_query($conn,$sqlUpdate)){
                            die("Erro ao inserir as informações do Forms na tabela selecionada(users)". mysqli_error($conn));
                        }else{
                            echo "<script language='javascript' type='text/javascript'>
                            alert('Dados Atualizados com sucesso!')
                            window.location.href='crud.php?acao=log_select'</script>";
                        }
                        
                        mysqli_close($conn);
                        
                        break;
    
                        case 'log_select':

                            //Criando tabela e cabeçalho de dados:
                            
                            echo "<meta charset='UTF-8'>";
                            echo "<center><table border=1>";
                            echo "<tr>";
                            echo "<th>Codigo</th>";
                            echo "<th>Nome</th>";
                            echo "<th>Senha</th>";
                            echo "<th>Email</th>";
                            echo "</tr>";
                            
                    
                            $sql= "SELECT * FROM log";
                            $resultado = mysqli_query($conn,$sql) or die("Erro ao retornar dados");
                    
                            echo "<center>Registro cadastrado na base de dados.</br></center>";
                    
                            while ($registro = mysqli_fetch_array($resultado))
                            {
                            $id = $registro['log_id'];
                            $name = $registro['log_name'];
                            $senha = $registro['user_password'];
                            $email = $registro['log_email'];
                            
                            echo "<tr>";
                            echo "<td>".$id."</td>";
                            echo "<td>".$name."</td>";
                            echo "<td>".$senha."</td>";
                            echo "<td>".$email."</td>";
                    
                            
                            echo "<td>
                            <a href='crud.php?acao=log_delete&id=$id'><img src='images/delete_crud.png' alt='Deletar' title='Deletar registro'></a>
                            <a href='crud.php?acao=log_montar&id=$id'><img src='images/update_crud.png' alt='Atualizar' title='Atualizar registro'></a>
                            <a href='view/index.php'><img src='images/insert_crud.png' alt='Inserir' title='Inserir registro'></a>
                            </tr>";
                            }
                            
                            break;

                            default:
                            header('Location:crud.php?acao=log_select');
                            die();
                            break;
                        
                                    break;
                        
                        }
                        
                            ?>