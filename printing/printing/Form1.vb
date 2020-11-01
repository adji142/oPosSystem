Imports CrystalDecisions.CrystalReports.Engine

Public Class Form1



    Private Sub Button1_Click(ByVal sender As System.Object, ByVal e As System.EventArgs) Handles Button1.Click
        Dim ex As New ExportGrid()
        Dim data As New PrintedData
        Dim ds As New DataSet
        ds = data.getPrintingdoc()
        If ds.Tables(0).Rows.Count > 0 Then
            ex._Create(ds.Tables(0).Rows(0)("NoTransaksi").ToString)
            data.UpdateFlag(ds.Tables(0).Rows(0)("NoTransaksi").ToString)
        Else

        End If
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