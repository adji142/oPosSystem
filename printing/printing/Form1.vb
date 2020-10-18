Imports CrystalDecisions.CrystalReports.Engine

Public Class Form1



    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click

        'Dim PrintPreviewDialog1 As PrintPreviewDialog = New PrintPreviewDialog

        'Dim PrintDocument1 As Drawing.Printing.PrintDocument = New Drawing.Printing.PrintDocument

        'PrintPreviewDialog1.Document = PrintDocument1

        ''PrintPreviewDialog1.ShowDialog()

        'AddHandler PrintDocument1.PrintPage, AddressOf Me.PrintDocument1_PrintPage

        'PrintDocument1.Print()

        'Dim Server As New ConnectionInfo
        Dim DataTable As Table

        Me.Cursor = Cursors.WaitCursor
        '-----------------------------------------------------------------------------------------   

        '-----------------------------------------------------------------------------------------   
        'Dim DBX As Object = New DBConnection().ConnectionSetting()

        'Setting Koneksi Database
        'With Server
        '    .ServerName = "DRIVER={MySQL ODBC 5.3 ANSI Driver};SERVER=" + DBX.Server + "; PORT = " + DBX.Port.ToString + "; "
        '    .DatabaseName = DBX.Database
        '    .UserID = DBX.UserID
        '    .Password = DBX.Password
        'End With
        '-----------------------------------------------------------------------------------------
        Dim RPTObject As New ReportDocument
        RPTObject.Load(System.AppDomain.CurrentDomain.BaseDirectory() + "\rptHasilPerankingan2.RPT")

        For Each DataTable In RPTObject.Database.Tables
            'DataTable.LogOnInfo.ConnectionInfo = Server
            DataTable.ApplyLogOnInfo(DataTable.LogOnInfo)
        Next

        'RPTObject.PrintToPrinter()

        Me.Cursor = Cursors.Default
    End Sub



    Private Sub Form1_Load(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles MyBase.Load

        'RichTextBox1.LoadFile("D:\Text.txt", RichTextBoxStreamType.PlainText)

        'PictureBox1.Image = Image.FromFile("E:\VBproject\Gap.bmp")

    End Sub



    Private Sub PrintDocument1_PrintPage(ByVal sender As System.Object, ByVal e As System.Drawing.Printing.PrintPageEventArgs)



        'Dim newImage As Image = Image.FromFile("E:\VBproject\Gap.bmp")


        'e.Graphics.DrawImage(newImage, 100, 100)

        ' You also can reference an image to PictureBox1.Image.



        'Dim txtReader As System.IO.StreamReader = New System.IO.StreamReader("D:\Text.txt")

        'Dim textOfFile As String = txtReader.ReadToEnd

        'txtReader.Close()

        e.Graphics.DrawString("Test Text", New Font("IDAutomationHC39M", 16), Brushes.Black, 50, 100)

        ' You also can reference some text to RichTextBox1.Text, etc.



    End Sub

End Class