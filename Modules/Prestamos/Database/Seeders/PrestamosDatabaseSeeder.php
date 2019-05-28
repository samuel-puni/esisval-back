<?php

namespace Modules\Prestamos\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class PrestamosDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::connection("prestamo")->table("cla_organismo_financiador")->delete();
        DB::connection("prestamo")->table("cla_organismo")->delete();
        DB::connection("prestamo")->table("cla_tipo_moneda")->delete();
        DB::connection("prestamo")->table("cla_tipo_organismo")->delete();
        //Model::unguard();
        DB::connection("prestamo")->table("cla_tipo_moneda")->insert([
            ["id" => 1,"tipo_moneda" => "BOLIVANOS","abreviacion" => "BOB"],
            ["id" => 2,"tipo_moneda" => "DOLARES","abreviacion" => "USD"],
            ["id" => 3,"tipo_moneda" => "EUROS","abreviacion" => "EUR"]
        ]);

        DB::connection("prestamo")->table("cla_tipo_organismo")->insert([
            //["id" => 1,"tipo_organismo" => "ORGANISMOS FINANCIADORES INTERNOS","abreviacion" => "OFI","descripcion" => ""],
            ["id" => 2,"tipo_organismo" => "ORGANISMOS FINANCIADORES EXTERNOS","abreviacion" => "OFE","descripcion" => ""]
        ]);

        DB::connection("prestamo")->table("cla_organismo")->insert([
            //["id"=>1,"organismo" => "Gobierno","abreviacion" => "GOB","tipo_organismo_id" => 1],
            //["id"=>2,"organismo" => "Organismos de Recursos Específicos","abreviacion" => "ORG-RECESP","tipo_organismo_id" => 1],
            ["id"=>3,"organismo" => "Organismos Multilaterales","abreviacion" => "MULT","tipo_organismo_id" => 2],
            ["id"=>4,"organismo" => "Organismos Bilaterales","abreviacion" => "BILAT","tipo_organismo_id" => 2],
            ["id"=>5,"organismo" => "Gobiernos Extranjeros","abreviacion" => "GOB.EXT","tipo_organismo_id" => 2],
            ["id"=>6,"organismo" => "Otros Organismos Financiadores Externos","abreviacion" => "OTR.EXT","tipo_organismo_id" => 2]
        ]);
        
        DB::connection("prestamo")->table("cla_organismo_financiador")->insert([
            //["organismo_financiador"=>"Tesoro General de la Nación","abreviacion"=>"TGN","codigo_presupuestario"=>"111","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Papeles","abreviacion"=>"TGN-P","codigo_presupuestario"=>"112","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Coparticipación Tributaria","abreviacion"=>"TGN-CT","codigo_presupuestario"=>"113","organismo_id"=>1],
            //["organismo_financiador"=>"Recursos de Contravalor","abreviacion"=>"RECON","codigo_presupuestario"=>"114","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Fondo de Compensación Departamental","abreviacion"=>"TGN-FCOMP","codigo_presupuestario"=>"116","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Impuesto Especial a los Hidrocarburos y sus Derivados","abreviacion"=>"TGN-IEHD","codigo_presupuestario"=>"117","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Impuesto Directo a los Hidrocarburos","abreviacion"=>"TGN-IDH","codigo_presupuestario"=>"119","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Impuesto a la Participación en Juegos","abreviacion"=>"TGN-IPJ","codigo_presupuestario"=>"120","organismo_id"=>1],
            //["organismo_financiador"=>"Tesoro General de la Nación–Patentes Petroleras","abreviacion"=>"TGN-PPET","codigo_presupuestario"=>"121","organismo_id"=>1],
            //["organismo_financiador"=>"Otros Organismos Financiadores del Gobierno","abreviacion"=>"OT-GO","codigo_presupuestario"=>"129","organismo_id"=>1],
            //["organismo_financiador"=>"TGN Otros Ingresos","abreviacion"=>"TGN-OT","codigo_presupuestario"=>"000","organismo_id"=>1],
            //["organismo_financiador"=>"Recursos Específicos de los Gobiernos Autónomos Municipales e Indígena Originario Campesino","abreviacion"=>"RECESP","codigo_presupuestario"=>"210","organismo_id"=>2],
            //["organismo_financiador"=>"Regalías","abreviacion"=>"REG","codigo_presupuestario"=>"220","organismo_id"=>2],
            //["organismo_financiador"=>"Otros Recursos Específicos","abreviacion"=>"OTPRO","codigo_presupuestario"=>"230","organismo_id"=>2],
            ["organismo_financiador"=>"Asociación Latinoamericana de Integración","abreviacion"=>"ALADI","codigo_presupuestario"=>"311","organismo_id"=>3],
            ["organismo_financiador"=>"Centro Interamericano de Agricultura Tropical","abreviacion"=>"CIAT","codigo_presupuestario"=>"312","organismo_id"=>3],
            ["organismo_financiador"=>"Comisión Económica para América Latina","abreviacion"=>"CEPAL","codigo_presupuestario"=>"313","organismo_id"=>3],
            ["organismo_financiador"=>"Corporación Andina de Fomento","abreviacion"=>"CAF","codigo_presupuestario"=>"314","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Andino de Reserva","abreviacion"=>"FAR","codigo_presupuestario"=>"315","organismo_id"=>3],
            ["organismo_financiador"=>"Instituto Interamericano de Cooperación Agrícola","abreviacion"=>"IICA","codigo_presupuestario"=>"316","organismo_id"=>3],
            ["organismo_financiador"=>"Comunidad Andina de Naciones","abreviacion"=>"CAN","codigo_presupuestario"=>"317","organismo_id"=>3],
            ["organismo_financiador"=>"Organización de los Estados Americanos","abreviacion"=>"OEA","codigo_presupuestario"=>"318","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Latinoamericana de Energía","abreviacion"=>"OLADE","codigo_presupuestario"=>"319","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Panamericana de Salud","abreviacion"=>"OPS","codigo_presupuestario"=>"321","organismo_id"=>3],
            ["organismo_financiador"=>"Sistema Económico Latinoamericano","abreviacion"=>"SELA","codigo_presupuestario"=>"322","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo de Desarrollo de Pueblos Indígenas de América Latina y El Caribe","abreviacion"=>"FPDPI","codigo_presupuestario"=>"323","organismo_id"=>3],
            ["organismo_financiador"=>"Centro NN.UU. para los Asentamientos Humanos","abreviacion"=>"HABITAT","codigo_presupuestario"=>"341","organismo_id"=>3],
            ["organismo_financiador"=>"Conferencia de las NN.UU. sobre Comercio y Desarrollo","abreviacion"=>"UNCTAD","codigo_presupuestario"=>"342","organismo_id"=>3],
            ["organismo_financiador"=>"Departamento de Cooperación Técnica para el Desarrollo","abreviacion"=>"DTCD","codigo_presupuestario"=>"343","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo de las NN.UU. para la Infancia","abreviacion"=>"UNICEF","codigo_presupuestario"=>"344","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo NN.UU. para la Actividad en Materia de Población","abreviacion"=>"UNFPA","codigo_presupuestario"=>"345","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Internacional de Desarrollo Agrícola","abreviacion"=>"FIDA","codigo_presupuestario"=>"346","organismo_id"=>3],
            ["organismo_financiador"=>"Instituto de NN.UU. para Formación Profesional e Investigación","abreviacion"=>"UNITAR","codigo_presupuestario"=>"347","organismo_id"=>3],
            ["organismo_financiador"=>"Organización de Aviación Civil Internacional","abreviacion"=>"OACI","codigo_presupuestario"=>"348","organismo_id"=>3],
            ["organismo_financiador"=>"Organización de las NN.UU. para el Desarrollo Industrial","abreviacion"=>"ONUDI","codigo_presupuestario"=>"349","organismo_id"=>3],
            ["organismo_financiador"=>"Organización de las NN.UU. para la Agricultura y la Alimentación","abreviacion"=>"FAO","codigo_presupuestario"=>"351","organismo_id"=>3],
            ["organismo_financiador"=>"Organización de las NN.UU. para la Educación, Ciencia y la Cultura","abreviacion"=>"UNESCO","codigo_presupuestario"=>"352","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Internacional de Energía Atómica","abreviacion"=>"OIEA","codigo_presupuestario"=>"353","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Internacional del Trabajo","abreviacion"=>"OIT","codigo_presupuestario"=>"354","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Mundial de la Salud","abreviacion"=>"OMS","codigo_presupuestario"=>"355","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Mundial de Meteorología","abreviacion"=>"OMM","codigo_presupuestario"=>"356","organismo_id"=>3],
            ["organismo_financiador"=>"Programa de las NN.UU. para el Desarrollo","abreviacion"=>"PNUD","codigo_presupuestario"=>"357","organismo_id"=>3],
            ["organismo_financiador"=>"Programa de NN.UU. para el Medio Ambiente","abreviacion"=>"PNUMA","codigo_presupuestario"=>"358","organismo_id"=>3],
            ["organismo_financiador"=>"Unión Internacional de Telecomunicaciones","abreviacion"=>"UIT","codigo_presupuestario"=>"359","organismo_id"=>3],
            ["organismo_financiador"=>"Unión Postal Universal","abreviacion"=>"UPU","codigo_presupuestario"=>"361","organismo_id"=>3],
            ["organismo_financiador"=>"Universidad de las Naciones Unidas","abreviacion"=>"UNU","codigo_presupuestario"=>"362","organismo_id"=>3],
            ["organismo_financiador"=>"Unión Europea","abreviacion"=>"UE","codigo_presupuestario"=>"371","organismo_id"=>3],
            ["organismo_financiador"=>"Consejo de Asistencia Mutua Económica","abreviacion"=>"CAME","codigo_presupuestario"=>"372","organismo_id"=>3],
            ["organismo_financiador"=>"Organization of the Petroleum Exporting Countries","abreviacion"=>"OPEC","codigo_presupuestario"=>"373","organismo_id"=>3],
            ["organismo_financiador"=>"Programa Mundial de Alimentos","abreviacion"=>"PMA","codigo_presupuestario"=>"374","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Internacional para las Migraciones","abreviacion"=>"OIM","codigo_presupuestario"=>"375","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo de NNUU para el Desarrollo y la Capitalización","abreviacion"=>"FNUDC","codigo_presupuestario"=>"376","organismo_id"=>3],
            ["organismo_financiador"=>"Programa de las NNUU para la Fiscalización Internacional de Drogas","abreviacion"=>"UNDCP","codigo_presupuestario"=>"377","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo de las NNUU para el Desarrollo de la Mujer","abreviacion"=>"UNIFEM","codigo_presupuestario"=>"378","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Rotativo de las NNUU para la Exploración de Recursos Naturales","abreviacion"=>"UNRFNRE","codigo_presupuestario"=>"379","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Nórdico para el Desarrollo","abreviacion"=>"NFD","codigo_presupuestario"=>"384","organismo_id"=>3],
            ["organismo_financiador"=>"Organización Internacional de Maderas Tropicales","abreviacion"=>"OIMT","codigo_presupuestario"=>"386","organismo_id"=>3],
            ["organismo_financiador"=>"Banco Interamericano de Desarrollo","abreviacion"=>"BID","codigo_presupuestario"=>"411","organismo_id"=>3],
            ["organismo_financiador"=>"Banco Internacional de Reconstrucción y Fomento","abreviacion"=>"BIRF","codigo_presupuestario"=>"412","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Financiero para el Desarrollo de la Cuenca del Plata","abreviacion"=>"FONPLATA","codigo_presupuestario"=>"413","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Monetario Internacional","abreviacion"=>"FMI","codigo_presupuestario"=>"414","organismo_id"=>3],
            ["organismo_financiador"=>"Agencia Internacional de Fomento (BM)","abreviacion"=>"AIF","codigo_presupuestario"=>"415","organismo_id"=>3],
            ["organismo_financiador"=>"Banco Interamericano de Ahorro–Préstamo","abreviacion"=>"BIAPE","codigo_presupuestario"=>"416","organismo_id"=>3],
            ["organismo_financiador"=>"Corporación Financiera Internacional (BM)","abreviacion"=>"CFI","codigo_presupuestario"=>"420","organismo_id"=>3],
            ["organismo_financiador"=>"Organismo Multilateral de Garantía de Inversiones (BM)","abreviacion"=>"OMGI","codigo_presupuestario"=>"421","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Multilateral de Inversiones (BID)","abreviacion"=>"FOMIN","codigo_presupuestario"=>"522","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Global del Medio Ambiente (BM)","abreviacion"=>"GEF","codigo_presupuestario"=>"524","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo Institucional de Desarrollo","abreviacion"=>"IDF","codigo_presupuestario"=>"526","organismo_id"=>3],
            ["organismo_financiador"=>"Otros Organismos Financiadores Multilaterales","abreviacion"=>"OT-MUL","codigo_presupuestario"=>"997","organismo_id"=>3],
            ["organismo_financiador"=>"Fondo de Ayuda al Equipamiento (España)","abreviacion"=>"FAE","codigo_presupuestario"=>"382","organismo_id"=>4],
            ["organismo_financiador"=>"Fondo de Integración y Desarrollo Bolivia-Argentina","abreviacion"=>"FIDAB","codigo_presupuestario"=>"383","organismo_id"=>4],
            ["organismo_financiador"=>"Banco de Importaciones-Exportaciones Japón","abreviacion"=>"EXIMBANK-J","codigo_presupuestario"=>"417","organismo_id"=>4],
            ["organismo_financiador"=>"Banco de Importaciones-Exportaciones Corea","abreviacion"=>"EXIMBANK-K","codigo_presupuestario"=>"418","organismo_id"=>4],
            ["organismo_financiador"=>"Banco de Importaciones-Exportaciones (EE. UU.)","abreviacion"=>"EXIMBANK-U","codigo_presupuestario"=>"419","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia Canadiense para el Desarrollo Internacional","abreviacion"=>"ACDI","codigo_presupuestario"=>"511","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia de Cooperación Internacional del Japón","abreviacion"=>"JICA","codigo_presupuestario"=>"512","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia de los EE.UU. para el Desarrollo","abreviacion"=>"USAID","codigo_presupuestario"=>"513","organismo_id"=>4],
            ["organismo_financiador"=>"Asistencia Internacional Danesa para el Desarrollo","abreviacion"=>"DANIDA","codigo_presupuestario"=>"514","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia Suiza para el Desarrollo y la Cooperación","abreviacion"=>"COSUDE","codigo_presupuestario"=>"515","organismo_id"=>4],
            ["organismo_financiador"=>"Instituto Alemán de Crédito para la Reconstrucción","abreviacion"=>"KFW","codigo_presupuestario"=>"516","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia de Cooperación Técnica de la República Alemana","abreviacion"=>"GIZ","codigo_presupuestario"=>"517","organismo_id"=>4],
            ["organismo_financiador"=>"Banco de Cooperación Internacional del Japón","abreviacion"=>"JBIC","codigo_presupuestario"=>"518","organismo_id"=>4],
            ["organismo_financiador"=>"Dir. General de Cooperación Internacional /Coop. Técnica Belga","abreviacion"=>"DGCI-CTB","codigo_presupuestario"=>"519","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia Sueca para el Desarrollo Internacional","abreviacion"=>"ASDI","codigo_presupuestario"=>"520","organismo_id"=>4],
            ["organismo_financiador"=>"Corporación Internacional de Desarrollo","abreviacion"=>"CID","codigo_presupuestario"=>"521","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia Canadiense para el Desarrollo Internacional Regional","abreviacion"=>"CIID","codigo_presupuestario"=>"523","organismo_id"=>4],
            ["organismo_financiador"=>"Instituto de Cooperación Iberoamericana","abreviacion"=>"ICI","codigo_presupuestario"=>"525","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia Noruega para el Desarrollo Internacional","abreviacion"=>"NORAD","codigo_presupuestario"=>"527","organismo_id"=>4],
            ["organismo_financiador"=>"Agencia Española de Cooperación Internacional","abreviacion"=>"AECID","codigo_presupuestario"=>"528","organismo_id"=>4],
            ["organismo_financiador"=>"Corporación de Créditos de Mercaderías (EE.UU.)","abreviacion"=>"CCC","codigo_presupuestario"=>"529","organismo_id"=>4],
            ["organismo_financiador"=>"Export Development Corporation (CANADA)","abreviacion"=>"EDC","codigo_presupuestario"=>"530","organismo_id"=>4],
            ["organismo_financiador"=>"Otros Organismos Financiadores Bilaterales","abreviacion"=>"OT-BIL","codigo_presupuestario"=>"998","organismo_id"=>4],
            ["organismo_financiador"=>"República Federal de Alemania","abreviacion"=>"ALEM","codigo_presupuestario"=>"541","organismo_id"=>5],
            ["organismo_financiador"=>"Argentina","abreviacion"=>"ARG","codigo_presupuestario"=>"542","organismo_id"=>5],
            ["organismo_financiador"=>"Bélgica","abreviacion"=>"BEL","codigo_presupuestario"=>"543","organismo_id"=>5],
            ["organismo_financiador"=>"Brasil","abreviacion"=>"BRA","codigo_presupuestario"=>"544","organismo_id"=>5],
            ["organismo_financiador"=>"Canadá","abreviacion"=>"CANADA","codigo_presupuestario"=>"545","organismo_id"=>5],
            ["organismo_financiador"=>"República de Corea","abreviacion"=>"COR","codigo_presupuestario"=>"546","organismo_id"=>5],
            ["organismo_financiador"=>"República Popular China","abreviacion"=>"CHINA","codigo_presupuestario"=>"548","organismo_id"=>5],
            ["organismo_financiador"=>"República China Nacionalista-Taiwán ","abreviacion"=>"CH-TAI","codigo_presupuestario"=>"549","organismo_id"=>5],
            ["organismo_financiador"=>"Dinamarca","abreviacion"=>"DIN","codigo_presupuestario"=>"551","organismo_id"=>5],
            ["organismo_financiador"=>"España","abreviacion"=>"ESP","codigo_presupuestario"=>"552","organismo_id"=>5],
            ["organismo_financiador"=>"Estados Unidos de América","abreviacion"=>"USA","codigo_presupuestario"=>"553","organismo_id"=>5],
            ["organismo_financiador"=>"Francia","abreviacion"=>"FRA","codigo_presupuestario"=>"554","organismo_id"=>5],
            ["organismo_financiador"=>"Gran Bretaña","abreviacion"=>"G-BR","codigo_presupuestario"=>"555","organismo_id"=>5],
            ["organismo_financiador"=>"Holanda","abreviacion"=>"HOL","codigo_presupuestario"=>"556","organismo_id"=>5],
            ["organismo_financiador"=>"Hungría","abreviacion"=>"HUN","codigo_presupuestario"=>"557","organismo_id"=>5],
            ["organismo_financiador"=>"Israel","abreviacion"=>"ISR","codigo_presupuestario"=>"558","organismo_id"=>5],
            ["organismo_financiador"=>"Italia","abreviacion"=>"ITA","codigo_presupuestario"=>"559","organismo_id"=>5],
            ["organismo_financiador"=>"Japón","abreviacion"=>"JAP","codigo_presupuestario"=>"561","organismo_id"=>5],
            ["organismo_financiador"=>"Noruega","abreviacion"=>"NOR","codigo_presupuestario"=>"562","organismo_id"=>5],
            ["organismo_financiador"=>"Perú","abreviacion"=>"PERU","codigo_presupuestario"=>"563","organismo_id"=>5],
            ["organismo_financiador"=>"Rumania","abreviacion"=>"RUM","codigo_presupuestario"=>"564","organismo_id"=>5],
            ["organismo_financiador"=>"Suecia","abreviacion"=>"SUE","codigo_presupuestario"=>"565","organismo_id"=>5],
            ["organismo_financiador"=>"Suiza","abreviacion"=>"SUI","codigo_presupuestario"=>"566","organismo_id"=>5],
            ["organismo_financiador"=>"Federación de Rusia","abreviacion"=>"RUSIA","codigo_presupuestario"=>"567","organismo_id"=>5],
            ["organismo_financiador"=>"República Bolivariana de Venezuela","abreviacion"=>"VEN","codigo_presupuestario"=>"568","organismo_id"=>5],
            ["organismo_financiador"=>"Polonia","abreviacion"=>"POL","codigo_presupuestario"=>"569","organismo_id"=>5],
            ["organismo_financiador"=>"Austria","abreviacion"=>"AUST","codigo_presupuestario"=>"571","organismo_id"=>5],
            ["organismo_financiador"=>"Sudáfrica","abreviacion"=>"SUDAF","codigo_presupuestario"=>"572","organismo_id"=>5],
            ["organismo_financiador"=>"Panamá","abreviacion"=>"PAN","codigo_presupuestario"=>"573","organismo_id"=>5],
            ["organismo_financiador"=>"Portugal","abreviacion"=>"PORT","codigo_presupuestario"=>"574","organismo_id"=>5],
            ["organismo_financiador"=>"República de Chile","abreviacion"=>"CHI","codigo_presupuestario"=>"575","organismo_id"=>5],
            ["organismo_financiador"=>"México","abreviacion"=>"MEX","codigo_presupuestario"=>"576","organismo_id"=>5],
            ["organismo_financiador"=>"República Oriental del Uruguay","abreviacion"=>"URU","codigo_presupuestario"=>"577","organismo_id"=>5],
            ["organismo_financiador"=>"Paraguay","abreviacion"=>"PARA","codigo_presupuestario"=>"578","organismo_id"=>5],
            ["organismo_financiador"=>"Filipinas","abreviacion"=>"FILIP","codigo_presupuestario"=>"579","organismo_id"=>5],
            ["organismo_financiador"=>"Colombia","abreviacion"=>"COL","codigo_presupuestario"=>"580","organismo_id"=>5],
            ["organismo_financiador"=>"Ecuador","abreviacion"=>"ECU","codigo_presupuestario"=>"581","organismo_id"=>5],
            ["organismo_financiador"=>"Cuba","abreviacion"=>"CU","codigo_presupuestario"=>"582","organismo_id"=>5],
            ["organismo_financiador"=>"Otros Gobiernos Extranjeros","abreviacion"=>"OT-G-EXT","codigo_presupuestario"=>"639","organismo_id"=>5],
            ["organismo_financiador"=>"Donaciones –HIPC II","abreviacion"=>"DON-HIPC","codigo_presupuestario"=>"115","organismo_id"=>6],
            ["organismo_financiador"=>"Care","abreviacion"=>"CARE","codigo_presupuestario"=>"641","organismo_id"=>6],
            ["organismo_financiador"=>"Caritas","abreviacion"=>"CARITAS","codigo_presupuestario"=>"642","organismo_id"=>6],
            ["organismo_financiador"=>"Plan Internacional","abreviacion"=>"PLAN-INTER","codigo_presupuestario"=>"643","organismo_id"=>6],
            ["organismo_financiador"=>"Fundación Amigos de la Naturaleza","abreviacion"=>"FAN","codigo_presupuestario"=>"644","organismo_id"=>6],
            ["organismo_financiador"=>"Otros Organismos no Gubernamentales","abreviacion"=>"OT-NOGUB","codigo_presupuestario"=>"669","organismo_id"=>6],
            ["organismo_financiador"=>"Bancos Privados","abreviacion"=>"BAN-PRI","codigo_presupuestario"=>"671","organismo_id"=>6],
            ["organismo_financiador"=>"Proveedores","abreviacion"=>"PROV","codigo_presupuestario"=>"672","organismo_id"=>6],
            ["organismo_financiador"=>"Organismos Financiadores Externos no Determinados","abreviacion"=>"ND-EXT","codigo_presupuestario"=>"719","organismo_id"=>6],
            ["organismo_financiador"=>"Basket Funding","abreviacion"=>"BASK-FUN","codigo_presupuestario"=>"720","organismo_id"=>6],
            ["organismo_financiador"=>"Otros Organismos Financiadores Externos","abreviacion"=>"OT-EXT","codigo_presupuestario"=>"729","organismo_id"=>6]
        ]);
    }
}
