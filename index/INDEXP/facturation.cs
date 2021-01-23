using System;
using System.Linq;
using System.Text;
using System.Net;
using SautinSoft.Document;

namespace generate_pdf_to_html
{
    class Program
    {
        static void Main(string[] args)
        {
            DocumentCore dc = new DocumentCore();
            dc.Content.End.Insert("hello World", new CharacterFormat());
            dc.Save("MonPDF.pdf");

            System.Diagnostics.Process.Start(new System.Diagnostics.ProcessStartInfo("MonPDF.pdf") { UseShellExecute = true });
        }
    }
}
