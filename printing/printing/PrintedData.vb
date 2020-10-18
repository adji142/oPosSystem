Imports Dapper
Imports printing.BOT
Public Class PrintedData
    Private _DBConnection As New DBConnection
    Public Function getPrintingdoc() As DataSet
        Dim DS As New DataSet
        Dim SQL = "select * from printinglog where Printed = 0 ORDER BY Sumitedat DESC LIMIT 1"
        Try
            Using DBX As IDbConnection = _DBConnection.Connection
                Dim CMD As New MySql.Data.MySqlClient.MySqlCommand(SQL, DBX)
                Dim DA As New MySql.Data.MySqlClient.MySqlDataAdapter

                DA.SelectCommand = CMD
                DA.Fill(DS, "View")
            End Using
        Catch ex As Exception
            Console.WriteLine(ex.Message)
        End Try
        getPrintingdoc = DS
    End Function
    Public Function UpdateFlag(ByVal NoTransaksi As String) As Boolean
        Dim SQL As String

        SQL = "UPDATE printinglog SET Printed = 1 " +
              "WHERE NoTransaksi = @NoTransaksi "

        Using DBX As IDbConnection = _DBConnection.Connection()
            Try
                DBX.Execute(SQL, New With {.NoTransaksi = NoTransaksi})
                UpdateFlag = True
            Catch ex As Exception
                UpdateFlag = False
            End Try
        End Using
    End Function
End Class
