<?php

use Illuminate\Database\Seeder;

class SubknowledgesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = date("Y-m-d H:i:s");
        DB::table("subknowledges")->insert([
            [	
                "name"       	=> "Caché",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "DB2",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"      	=> "Firebird",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Informix",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Interbase",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Oracle",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "PostgreSQL",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "SQL Server",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Sybase",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "ASP",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "ASP.Net",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "C",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "C#",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "C+",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "C++",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "COBOL",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "CSS",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Cuda extensions",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Dot Net",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Erlang",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "HTML",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Java",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "JavaScript",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "jQuery",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "MATLAB",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "PHP",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Python",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "R",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Ruby",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "VB.Net",
                "knowledge_id"  => "2",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "3ds Max",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Adobe Ilustrator",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Adobe Photoshop",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Blender",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "CorelDraw",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Expression Web",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "GIMP",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "GIMP",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Macromedia Dreamweaver",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Macromedia Fireworks",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Macromedia Flash",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Macromedia Freehand",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Paint Shop Pro",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Pixia",
                "knowledge_id"  => "3",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "LibreOffice",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Lotus Notes",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Microsoft Access",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Microsoft Excel",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Microsoft Outlook",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Microsoft PowerPoint",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Microsoft Word",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Open Office",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "StarOffice",
                "knowledge_id"  => "4",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "FreeBSD",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "IBM OS",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "JavaOS",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Linux",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Mac OS",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "NetBSD",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "NT 4.0",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Solaris",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "UNIX",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "VMS",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Windows",
                "knowledge_id"  => "5",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "AutoCAD",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "CRM",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Edição de Som",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Edição de Video",
                "knowledge_id"  => "1",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "ERP",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Microsoft Project",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "SAP",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Selenium",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Servidores de E-mail",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Servidores Proxy",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Servidores Web",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ], [
                "name"       	=> "Software  de Contabilidade",
                "knowledge_id"  => "6",
                "created_at" 	=> $now,
                "updated_at" 	=> $now,
            ],

        ]);
    }
}
