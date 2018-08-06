<?php
   header( 'Content-type: application/csv' );   
   header( 'Content-Disposition: attachment; filename=base.csv' );   
   header( 'Content-Transfer-Encoding: binary' );
   header( 'Pragma: no-cache');

   $pdo = new PDO( 'mysql:host=localhost;dbname=cadastro', 'root', '' );
   $stmt = $pdo->prepare( 'SELECT * FROM clientes' );   
   $stmt->execute();
   $results = $stmt->fetchAll( PDO::FETCH_ASSOC );

   $out = fopen( 'php://output', 'w' );
   foreach ( $results as $result ) 
   {
      fputcsv( $out, $result );
   }
   fclose( $out );
?>

