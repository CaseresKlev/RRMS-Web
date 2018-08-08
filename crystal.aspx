<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

  <head runat="server">
    <title></title>
    <script src="jquery-1.11.2.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="js/DataTables/datatables.min.js"></script>
    <script src="//cdn.datatables.net/tabletools/2.2.4/js/dataTables.tableTools.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="js/DataTables.datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/tabletools/2.2.4/css/dataTables.tableTools.css" />

    <script type="text/javascript">
      $(document).ready(function() {
        var table = $('#datatable').dataTable();
        var tableTools = new $.fn.dataTable.TableTools(table, {
          'aButtons': [{
              'sExtends': 'xls',
              'sButtonText': 'Save to Excel',
              'sFileName': 'Data.xls'
            },
            {
              'sExtends': 'print',
              'bShowAll': true,
            },
            {
              'sExtends': 'pdf',
              'bFooter': false
            },
            'copy',
            'csv'
          ],
          'sSwfPath': '//cdn.datatables.net/tabletools/2.2.4/swf/copy_csv_xls_pdf.swf'
        });
        $(tableTools.fnContainer()).insertBefore('#datatable_wrapper');
      });
    </script>
  </head>

  <body style="font-family: Arial">
    <form id="form1" runat="server">
      <div style="width: 800px; border: 1px solid black; padding: 3px">
        <table id="datatable">
          <thead>
            <tr>
              <th>ID
              </th>
              <th>City
              </th>
              <th>Country
              </th>
              <th>Continent
              </th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>ID
              </th>
              <th>City
              </th>
              <th>Country
              </th>
              <th>Continent
              </th>
            </tr>
          </tfoot>
          <tbody>
            <tr>
              <td>1</td>
              <td>Montería</td>
              <td>Colombia</td>
              <td>South America</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Birmingham</td>
              <td>United Kingdom</td>
              <td>Europe</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Bangalore</td>
              <td>India</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Tokyo</td>
              <td>Japan</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Kuala Lumpur</td>
              <td>Malaysia</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>6</td>
              <td>Rio de Janeiro</td>
              <td>Brazil</td>
              <td>South America</td>
            </tr>
            <tr>
              <td>7</td>
              <td>Ipoh</td>
              <td>Malaysia</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>8</td>
              <td>Tawau</td>
              <td>Malaysia</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>9</td>
              <td>Hiroshima</td>
              <td>Japan</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>10</td>
              <td>Cannes</td>
              <td>France</td>
              <td>Europe</td>
            </tr>
            <tr>
              <td>11</td>
              <td>London</td>
              <td>United Kingdom</td>
              <td>Europe</td>
            </tr>
            <tr>
              <td>12</td>
              <td>Saku</td>
              <td>Japan</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>13</td>
              <td>Nice</td>
              <td>France</td>
              <td>Europe</td>
            </tr>

            <tr>
              <td>14</td>
              <td>Manchester</td>
              <td>United Kingdom</td>
              <td>Europe</td>
            </tr>
            <tr>
              <td>15</td>
              <td>Salvador</td>
              <td>Brazil</td>
              <td>South America</td>
            </tr>

            <tr>
              <td>16</td>
              <td>Cali</td>
              <td>Colombia</td>
              <td>South America</td>
            </tr>
            <tr>
              <td>17</td>
              <td>Chennai</td>
              <td>India</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>18</td>
              <td>Brasília</td>
              <td>Brazil</td>
              <td>South America</td>
            </tr>
            <tr>
              <td>19</td>
              <td>Mumbai</td>
              <td>India</td>
              <td>Asia</td>
            </tr>
            <tr>
              <td>20</td>
              <td>Paris</td>
              <td>France</td>
              <td>Europe</td>
            </tr>
            <tr>
              <td>21</td>
              <td>Bello</td>
              <td>Colombia</td>
              <td>South America</td>
            </tr>
          </tbody>
        </table>
      </div>
    </form>
  </body>

</html>