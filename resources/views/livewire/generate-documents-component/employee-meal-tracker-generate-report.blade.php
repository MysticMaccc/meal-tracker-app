<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        *{
            font-family: 'Courier New', Courier, monospace;
            font-size: 10px;
        }
        /* CSS for table */
        table {
          width: 100%;
          border-collapse: collapse;
        }
    
        th, td {
          border: 1px solid #000000;
          padding: 8px;
          text-align: left;
        }
    
        th {
          background-color: #000000;
          text-align: center;

        }
    
        tr:nth-child(even) {
          background-color: #000000;
        }

        .data{
            text-align: center;
        }
      </style>
    </head>
    <body>
    <div style="text-align: center; margin-top: .3em;">
        <h4>Employee Meal Monitoring Report <br>  <span style="font-weight: regular; font-size: 10px;">Date Range ({{ session('daterange'); }})</span></h4>
    </div>
    
    <table>
      <thead>
        <tr style="font-weight: bold; background-color: #9b9b9b;">
          <th class="data">Barcode #</th> 
          <th class="data">Name</th>
          <th class="data">Meal Type</th>
          <th class="data">Date</th>
          <th class="data">Time</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($meal_logs as $data)
            <tr style="background-color: #faf9f9;">
                <td class="data">{{ $data->barcode->card_number }}</td>
                <td>{{ $data->barcode->owner }}</td>
                <td class="data">{{ $data->meal_type->name }}</td>
                <td class="data">{{ $data->date_scanned }}</td>
                <td class="data">{{ $data->time_scanned }}</td>
            </tr>
        @endforeach
        <!-- Add more rows as needed -->
      </tbody>
    </table>
    
</body>
</html>
