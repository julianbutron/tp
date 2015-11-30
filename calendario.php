<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Calendario</title>
        <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
        <style type="text/css">

		.titulo{
		float: left;
		font-size: 30pt;
		font-family: helvetica;
		color: white;
		text-align: center;
		font-weight: bold;
		margin: 0 0 0 250px;
		}
		.imagen_cerrar{
		float: left;
		width:50px;
		height:50px;
		border-style: groove; 
		border-width: 0px;
		margin: 0 0 0 220px;

		border-radius: 5px;
		}
		
		body{margin:0;
		font-family:Lato;
		}
		ul,li{list-style-type:none;
		margin:0;padding:0;}
		
		.calendar{padding: 10px 0px 0px 40px;}
		
		.calendar 
		.day{background:#ecf0f1;
		border-bottom:2px solid #bdc3c7;
		float:left;
		padding-left: 20px;
		margin:1px;
		position:relative;
		height:100px;
		width:100px;}
		
		.day.marked{background:#3498db;
		border-color:#2980b9;}
		
		.day .day-number{color:#7f8c8d;
		left:5px;
		position:absolute;top:5px;}
		
		.day.marked 
		.day-number{color:white;}.day 
		.events{color:white;
		margin: 22px 7px 5px;
		height:78px;
		overflow-x:hidden;
		overflow-y:hidden;}.day 
		.events h5{margin:0 0 5px;
		overflow:hidden;text-overflow:ellipsis;
		white-space:nowrap;width:100%;}.day .events strong,.day .events span{display:block;font-size:8px;}.day .events ul{}.day .events li{}</style>
    </head>
    <body Background="imagenes\fondo.jpg">
	<div class="calendar">
    <?php

        $mysqli = new mysqli('localhost', 'root', '1234', 'empresalogistica');

        if ( $mysqli->connect_errno )
        {
            die( $mysqli->mysqli_connect_error() );
        }

        $result = $mysqli->query('SELECT * FROM viaje');

        if( !$result )
            die( $mysqli->error );

        $events = array();

        while($row = $result->fetch_assoc())
        {
            $start_date = new DateTime($row['fecha_partida']);
            $end_date = new DateTime($row['fecha_llegada']);
            $day = $start_date->format('j');

            $events[$day][] = array(
                'start_hour' => $start_date->format('G:i a'),
                'end_hour' => $end_date->format('G:i a'),
                'description' => $row['tipo_carga']
            );
        }

        $datetime = new DateTime();

        // mes en texto
        $txt_months = array(
            'Enero', 'Febrero', 'Marzo',
            'Abril', 'Mayo', 'Junio',
            'Julio', 'Agosto', 'septiembre',
            'Octubre', 'Noviembre', 'Diciembre'
        );

        $month_txt = $txt_months[$datetime->format('n')-1];

        // ultimo dia del mes
        $month_days = date('j', strtotime("last day of"));
		
		//cabecera del calendario
        echo '<div class="titulo">' . $month_txt . '</div><a href="menu_supervisor.php"><img src="imagenes\cerrar.png" class="imagen_cerrar"/></a><br><br><br>';
		


        foreach(range(1, $month_days) as $day)
        {
            $marked = false;
            $events_list = array();

            foreach($events as $event_day => $event)
            {
                // si el dia del evento coincide lo marcamos y guardamos la informacion
                if($event_day == $day)
                {
                    $marked = true;
                    $events_list = $event;
                    break;
                }
            }

            echo '
            <div class="day' . ($marked ? ' marked' : '') . '">
                <strong class="day-number">' . $day . '</strong>
                <div class="events"><ul>';

                    foreach($events_list as $event)
                    {
                        echo '<li>
                            <h5>' . $event['description'] . '</h5>
                            <div>
                                <strong>Inicio:</strong>
                                <span>' . $event['start_hour'] . '</span>
                            </div>

                            <div>
                                <strong>Fin:</strong>
                                <span>' . $event['end_hour'] . '</span>
                            </div>
                        </li>';
                    }

                echo '</ul></div>
            </div>';
        }
        ?>
	</div>
    </body>
    </html>