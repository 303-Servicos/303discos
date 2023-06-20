<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    public function run(): void
    {
        Label::create([
            'name'    => '303 Alliance',
            'logo'    => config('app.url') . '/images/labels/303-alliance.jpg',
            'discogs' => 'https://www.discogs.com/label/683425-303-Alliance',
        ]);

        Label::create([
            'name'    => '303 Alliance Limited',
            'logo'    => config('app.url') . '/images/labels/303-alliance-limited.jpg',
            'discogs' => 'https://www.discogs.com/label/683425-303-Alliance',
        ]);

        Label::create([
            'name'    => '4x4',
            'logo'    => config('app.url') . '/images/labels/4x4.jpg',
            'discogs' => 'https://www.discogs.com/label/1543-4-x-4-Recordings',
        ]);

        Label::create([
            'name'    => '76B',
            'logo'    => config('app.url') . '/images/labels/76b.png',
            'discogs' => 'https://www.discogs.com/label/2580571-76b',
        ]);

        Label::create([
            'name'    => '909 Editions',
            'logo'    => config('app.url') . '/images/labels/909-editions.jpg',
            'discogs' => 'https://www.discogs.com/label/725844-909-Editions',
        ]);

        Label::create([
            'name'    => '99.9',
            'logo'    => config('app.url') . '/images/labels/99.9.jpg',
            'discogs' => 'https://www.discogs.com/label/213782-999',
        ]);

        Label::create([
            'name'    => 'Abusive 303',
            'logo'    => config('app.url') . '/images/labels/abusive-303.jpg',
            'discogs' => 'https://www.discogs.com/label/361801-Abusive-303',
        ]);

        Label::create([
            'name'    => 'Acid Artists In Action (Triple A)',
            'logo'    => config('app.url') . '/images/labels/acid-artists-in-action-triple-a.jpg',
            'discogs' => 'https://www.discogs.com/label/2303971-Triple-A-3',
        ]);

        Label::create([
            'name'    => 'Acid Corp',
            'logo'    => config('app.url') . '/images/labels/acid-corp.jpg',
            'discogs' => 'https://www.discogs.com/label/327246-Acid-Corp',
        ]);

        Label::create([
            'name'    => 'Acid Resistance',
            'logo'    => config('app.url') . '/images/labels/acid-resistance.jpg',
            'discogs' => 'https://www.discogs.com/label/594256-Acid-Resistance-Records',
        ]);

        Label::create([
            'name'    => 'AnArchway Noise',
            'logo'    => config('app.url') . '/images/labels/anarchway-noise.jpg',
            'discogs' => 'https://www.discogs.com/label/1233273-Anarchway-Noise',
        ]);

        Label::create([
            'name'    => 'Avinit Records',
            'logo'    => config('app.url') . '/images/labels/avinit-records.jpg',
            'discogs' => 'https://www.discogs.com/label/248830-Avinit-Records',
        ]);

        Label::create([
            'name'    => 'Bang On',
            'logo'    => config('app.url') . '/images/labels/bang-on.jpg',
            'discogs' => 'https://www.discogs.com/label/8195-Bang-On',
        ]);

        Label::create([
            'name'    => 'Beetroot',
            'logo'    => config('app.url') . '/images/labels/beetroot.jpg',
            'discogs' => 'https://www.discogs.com/label/147463-Beetroot',
        ]);

        Label::create([
            'name'    => 'Blackout Audio',
            'logo'    => config('app.url') . '/images/labels/blackout-audio.jpg',
            'discogs' => 'https://www.discogs.com/label/1448-Blackout-Audio',
        ]);

        Label::create([
            'name'    => 'Bodyshock',
            'logo'    => config('app.url') . '/images/labels/bodyshock.jpg',
            'discogs' => 'https://www.discogs.com/label/44519-Bodyshock',
        ]);

        Label::create([
            'name'    => 'Central Music Ltd',
            'logo'    => config('app.url') . '/images/labels/central-music-ltd.jpg',
            'discogs' => 'https://www.discogs.com/label/224625-Central-Music-Ltd',
        ]);

        Label::create([
            'name'    => 'Cerber Records',
            'logo'    => config('app.url') . '/images/labels/cerber-records.jpg',
            'discogs' => 'https://www.discogs.com/label/1660965-Cerber-Records',
        ]);

        Label::create([
            'name'    => 'Chase Yer Tail',
            'logo'    => config('app.url') . '/images/labels/chase-yer-tail.jpg',
            'discogs' => 'https://www.discogs.com/label/26159-Chase-Yer-Tail',
        ]);

        Label::create([
            'name'    => 'Cluster',
            'logo'    => config('app.url') . '/images/labels/cluster.jpg',
            'discogs' => 'https://www.discogs.com/label/2801-Cluster-Records',
        ]);

        Label::create([
            'name'    => 'Corrosive Records',
            'logo'    => config('app.url') . '/images/labels/corrosive-records.jpg',
            'discogs' => 'https://www.discogs.com/label/205402-Corrosive-Records-2',
        ]);

        Label::create([
            'name'    => 'DDC Records',
            'logo'    => config('app.url') . '/images/labels/ddc-records.jpg',
            'discogs' => 'https://www.discogs.com/label/1733950-DDCRecords',
        ]);

        Label::create([
            'name'    => 'Emetic',
            'logo'    => config('app.url') . '/images/labels/emetic.jpg',
            'discogs' => 'https://www.discogs.com/label/20244-Emetic',
        ]);

        Label::create([
            'name'    => 'Flatlife Deep',
            'logo'    => config('app.url') . '/images/labels/flatlife-deep.jpg',
            'discogs' => 'https://www.discogs.com/label/469405-Flatlife-Deep',
        ]);

        Label::create([
            'name'    => 'Flatlife Records',
            'logo'    => config('app.url') . '/images/labels/flatlife-records.jpg',
            'discogs' => 'https://www.discogs.com/label/135833-Flatlife-Records',
        ]);

        Label::create([
            'name'    => 'Fresh Grind',
            'logo'    => config('app.url') . '/images/labels/fresh-grind.jpg',
            'discogs' => 'https://www.discogs.com/label/14460-Fresh-Grind-Recordings',
        ]);

        Label::create([
            'name'    => 'Furious Wax',
            'logo'    => config('app.url') . '/images/labels/furious-wax.jpg',
            'discogs' => 'https://www.discogs.com/label/901428-Furious-Wax-Records',
        ]);

        Label::create([
            'name'    => 'Getafix',
            'logo'    => config('app.url') . '/images/labels/getafix.jpg',
            'discogs' => 'https://www.discogs.com/label/16214-Getafix-Records',
        ]);

        Label::create([
            'name'    => 'Hard Party Records',
            'logo'    => config('app.url') . '/images/labels/hard-party-records.jpg',
            'discogs' => 'https://www.discogs.com/label/795704-Hard-Party-Records',
        ]);

        Label::create([
            'name'    => 'Hazchem',
            'logo'    => config('app.url') . '/images/labels/hazchem.jpg',
            'discogs' => 'https://www.discogs.com/label/3619-Hazchem',
        ]);

        Label::create([
            'name'    => 'Highwire',
            'logo'    => config('app.url') . '/images/labels/highwire.jpg',
            'discogs' => 'https://www.discogs.com/label/1435-Highwire',
        ]);

        Label::create([
            'name'    => 'Hive',
            'logo'    => config('app.url') . '/images/labels/hive.jpg',
            'discogs' => 'https://www.discogs.com/label/131582-Hive-2',
        ]);

        Label::create([
            'name'    => 'Hydraulix',
            'logo'    => config('app.url') . '/images/labels/hydraulix.jpg',
            'discogs' => 'https://www.discogs.com/label/2598-Hydraulix',
        ]);

        // Label::create([
        //     'name' => 'Hydraulix VA',
        //     'logo' => config('app.url) . 's/torage/images/labels/hydraulix-va.jpg',
        //     'discogs' => 'https://www.discogs.com/label/2598-Hydraulix',
        // ]);

        Label::create([
            'name'    => 'Impacted Chaos',
            'logo'    => config('app.url') . '/images/labels/impacted-chaos.jpg',
            'discogs' => 'https://www.discogs.com/label/929375-Impacted-Chaos',
        ]);

        Label::create([
            'name'    => 'Infected',
            'logo'    => config('app.url') . '/images/labels/infected.jpg',
            'discogs' => 'https://www.discogs.com/label/4014-Infected',
        ]);

        Label::create([
            'name'    => 'Interstate Remix',
            'logo'    => config('app.url') . '/images/labels/interstate-remix.jpg',
            'discogs' => 'https://www.discogs.com/label/880198-Interstate-Remix',
        ]);

        Label::create([
            'name'    => 'Low Rent Operator',
            'logo'    => config('app.url') . '/images/labels/low-rent-operator.jpg',
            'discogs' => 'https://www.discogs.com/label/7271-Low-Rent-Operator',
        ]);

        Label::create([
            'name'    => 'Magnetic North',
            'logo'    => config('app.url') . '/images/labels/magnetic-north.jpg',
            'discogs' => 'https://www.discogs.com/label/1441-Magnetic-North',
        ]);

        Label::create([
            'name'    => 'Mass United',
            'logo'    => config('app.url') . '/images/labels/mass-united.jpg',
            'discogs' => 'https://www.discogs.com/label/327113-Mass-United',
        ]);

        Label::create([
            'name'    => 'Mastertraxx',
            'logo'    => config('app.url') . '/images/labels/mastertraxx.jpg',
            'discogs' => 'https://www.discogs.com/label/24869-Mastertraxx',
        ]);

        Label::create([
            'name'    => 'Maximum Minimum',
            'logo'    => config('app.url') . '/images/labels/maximum-minimum.jpg',
            'discogs' => 'https://www.discogs.com/label/553-Maximum-Minimum',
        ]);

        Label::create([
            'name'    => 'Molekül',
            'logo'    => config('app.url') . '/images/labels/molekul.jpg',
            'discogs' => 'https://www.discogs.com/label/1015178-Molek%C3%BCl',
        ]);

        Label::create([
            'name'    => 'Neuroshocked',
            'logo'    => config('app.url') . '/images/labels/neuroshocked.jpg',
            'discogs' => 'https://www.discogs.com/label/48460-Neuroshocked-Recordings',
        ]);

        Label::create([
            'name'    => 'Noradrenalin',
            'logo'    => config('app.url') . '/images/labels/noradrenalin.jpg',
            'discogs' => 'https://www.discogs.com/label/429996-Noradrenalin-Records',
        ]);

        Label::create([
            'name'    => 'NTK',
            'logo'    => config('app.url') . '/images/labels/ntk.jpg',
            'discogs' => 'https://www.discogs.com/label/1509342-NTK-Records',
        ]);

        Label::create([
            'name'    => 'Official',
            'logo'    => config('app.url') . '/images/labels/official.jpg',
            'discogs' => 'https://www.discogs.com/label/250196-Official-2',
        ]);

        Label::create([
            'name'    => 'Pattern Play',
            'logo'    => config('app.url') . '/images/labels/pattern-play.jpg',
            'discogs' => 'https://www.discogs.com/label/7987-Pattern-Play-Records',
        ]);

        Label::create([
            'name'    => 'Pimp Records',
            'logo'    => config('app.url') . '/images/labels/pimp-records.jpg',
            'discogs' => 'https://www.discogs.com/label/7516-Pimp-Records',
        ]);

        Label::create([
            'name'    => 'Planet Acid Techno',
            'logo'    => config('app.url') . '/images/labels/planet-acid-techno.jpg',
            'discogs' => 'https://www.discogs.com/label/1509290-Planet-Acid-Techno',
        ]);

        Label::create([
            'name'    => 'Planet Rhythm',
            'logo'    => config('app.url') . '/images/labels/planet-rhythm.jpg',
            'discogs' => 'https://www.discogs.com/label/347-Planet-Rhythm-Records',
        ]);

        Label::create([
            'name'    => 'Planet Techno',
            'logo'    => config('app.url') . '/images/labels/planet-techno.jpg',
            'discogs' => 'https://www.discogs.com/label/652034-Planet-Techno',
        ]);

        Label::create([
            'name'    => 'PLS.UK',
            'logo'    => config('app.url') . '/images/labels/plsuk.jpg',
            'discogs' => 'https://www.discogs.com/label/899314-PLSUK',
        ]);

        Label::create([
            'name'    => 'Possession',
            'logo'    => config('app.url') . '/images/labels/possession.jpg',
            'discogs' => 'https://www.discogs.com/label/1903342-Possession-2',
        ]);

        Label::create([
            'name'    => 'Pounding Grooves',
            'logo'    => config('app.url') . '/images/labels/pounding-grooves.jpg',
            'discogs' => 'https://www.discogs.com/label/866-Pounding-Grooves',
        ]);

        Label::create([
            'name'    => 'Pounding Warehouse',
            'logo'    => config('app.url') . '/images/labels/pounding-warehouse.jpg',
            'discogs' => 'https://www.discogs.com/label/2206678-Pounding-Warehouse-Recordings',
        ]);

        Label::create([
            'name'    => 'Powertools',
            'logo'    => config('app.url') . '/images/labels/powertools.jpg',
            'discogs' => 'https://www.discogs.com/label/2899-Power-Tools',
        ]);

        Label::create([
            'name'    => 'Project 303',
            'logo'    => config('app.url') . '/images/labels/project-303.jpg',
            'discogs' => 'https://www.discogs.com/label/546085-Project-303',
        ]);

        Label::create([
            'name'    => 'Racetrax',
            'logo'    => config('app.url') . '/images/labels/racetrax.jpg',
            'discogs' => 'https://www.discogs.com/label/25872-RaceTrax',
        ]);

        Label::create([
            'name'    => 'Ripe Analogue Waveforms (RAW)',
            'logo'    => config('app.url') . '/images/labels/ripe-analogue-waveforms-raw.jpg',
            'discogs' => 'https://www.discogs.com/label/1862-Ripe-Analogue-Waveforms-RAW',
        ]);

        Label::create([
            'name'    => 'Rebeltek',
            'logo'    => config('app.url') . '/images/labels/rebeltek.jpg',
            'discogs' => 'https://www.discogs.com/label/740503-Rebeltek',
        ]);

        Label::create([
            'name'    => 'Routemaster',
            'logo'    => config('app.url') . '/images/labels/routemaster.jpg',
            'discogs' => 'https://www.discogs.com/label/2599-Routemaster-Records',
        ]);

        Label::create([
            'name'    => 'Scythe Squadron',
            'logo'    => config('app.url') . '/images/labels/scythe-squadron.jpg',
            'discogs' => 'https://www.discogs.com/label/74667-Scythe-Squadron',
        ]);

        Label::create([
            'name'    => 'Scythe Squadron Remix',
            'logo'    => config('app.url') . '/images/labels/scythe-squadron-remix.jpg',
            'discogs' => 'https://www.discogs.com/label/1049757-Scythe-Squadron-Remix',
        ]);

        Label::create([
            'name'    => 'Skankadelic',
            'logo'    => config('app.url') . '/images/labels/skankadelic.jpg',
            'discogs' => 'https://www.discogs.com/label/18034-Skankadelic-Sounds',
        ]);

        Label::create([
            'name'    => 'Smitten',
            'logo'    => config('app.url') . '/images/labels/smitten.jpg',
            'discogs' => 'https://www.discogs.com/label/2583-Smitten',
        ]);

        Label::create([
            'name'    => 'Smitten Remix',
            'logo'    => config('app.url') . '/images/labels/smitten-remix.jpg',
            'discogs' => 'https://www.discogs.com/label/113276-Smitten-Remix',
        ]);

        Label::create([
            'name'    => 'Soma',
            'logo'    => config('app.url') . '/images/labels/soma.jpg',
            'discogs' => 'https://www.discogs.com/label/18-Soma-Quality-Recordings',
        ]);

        Label::create([
            'name'    => 'Southside Records',
            'logo'    => config('app.url') . '/images/labels/southside-records.jpg',
            'discogs' => 'https://www.discogs.com/release/26043718-Various-Southside-Records-002',
        ]);

        Label::create([
            'name'    => 'Sp Groove Records',
            'logo'    => config('app.url') . '/images/labels/sp-groove-records.jpg',
            'discogs' => 'https://www.discogs.com/label/16528-SP-Groove-Records',
        ]);

        Label::create([
            'name'    => 'Spartek',
            'logo'    => config('app.url') . '/images/labels/spartek.jpg',
            'discogs' => 'https://www.discogs.com/label/49808-Spartek',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Classics',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-classics.jpg',
            'discogs' => 'https://www.discogs.com/label/144989-Stay-Up-Forever-Classics',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Records',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-records.jpg',
            'discogs' => 'https://www.discogs.com/label/1183-Stay-Up-Forever',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Remixes',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-remixes.jpg',
            'discogs' => 'https://www.discogs.com/label/12995-Stay-Up-Forever-Remix',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Special',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-special.jpg',
            'discogs' => 'https://www.discogs.com/label/1183-Stay-Up-Forever',
        ]);

        Label::create([
            'name'    => 'Stompin\' Ground',
            'logo'    => config('app.url') . '/images/labels/stompin-ground.jpg',
            'discogs' => 'https://www.discogs.com/label/1016798-Stompin-Ground-Records-3',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Overdose',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-overdose.jpg',
            'discogs' => 'https://www.discogs.com/label/1183-Stay-Up-Forever',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Party Trax',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-party-trax.jpg',
            'discogs' => 'https://www.discogs.com/label/165039-Stay-Up-Forever-Party-Trax',
        ]);

        Label::create([
            'name'    => 'Stay Up Forever Special vs Harbor Concept',
            'logo'    => config('app.url') . '/images/labels/stay-up-forever-special-vs-harbor-concept.jpg',
            'discogs' => 'https://www.discogs.com/release/17504857-Various-Spitfire',
        ]);

        Label::create([
            'name'    => 'Superconductor',
            'logo'    => config('app.url') . '/images/labels/superconductor.jpg',
            'discogs' => 'https://www.discogs.com/label/40984-Superconductor',
        ]);

        Label::create([
            'name'    => 'TEC',
            'logo'    => config('app.url') . '/images/labels/tec.jpg',
            'discogs' => 'https://www.discogs.com/label/913-TeC',
        ]);

        Label::create([
            'name'    => 'Techno Slut',
            'logo'    => config('app.url') . '/images/labels/techno-slut.jpg',
            'discogs' => 'https://www.discogs.com/label/5248-Techno-Slut-Records',
        ]);

        Label::create([
            'name'    => 'Teknic',
            'logo'    => config('app.url') . '/images/labels/teknic.jpg',
            'discogs' => 'https://www.discogs.com/label/34052-Teknic-Records',
        ]);

        Label::create([
            'name'    => 'Tekno Mulisha',
            'logo'    => config('app.url') . '/images/labels/tekno-mulisha.jpg',
            'discogs' => 'https://www.discogs.com/label/819294-Tekno-Mulisha',
        ]);

        Label::create([
            'name'    => 'Tension Music',
            'logo'    => config('app.url') . '/images/labels/tension-music.jpg',
            'discogs' => 'https://www.discogs.com/label/1773147-Tension-Music',
        ]);

        Label::create([
            'name'    => 'Toolbox Killerz',
            'logo'    => config('app.url') . '/images/labels/toolbox-killerz.jpg',
            'discogs' => 'https://www.discogs.com/label/80259-Toolbox-Killerz',
        ]);

        Label::create([
            'name'    => 'Top Shelf',
            'logo'    => config('app.url') . '/images/labels/top-shelf.jpg',
            'discogs' => 'https://www.discogs.com/label/23454-Top-Shelf',
        ]);

        Label::create([
            'name'    => 'Truelove',
            'logo'    => config('app.url') . '/images/labels/truelove.png',
            'discogs' => 'https://www.discogs.com/label/30746-Truelove',
        ]);

        Label::create([
            'name'    => 'UFO Recordings',
            'logo'    => config('app.url') . '/images/labels/ufo-recordings.jpg',
            'discogs' => 'https://www.discogs.com/label/559851-UFO-Recordings',
        ]);

        Label::create([
            'name'    => 'Under No King',
            'logo'    => config('app.url') . '/images/labels/under-no-king.jpg',
            'discogs' => 'https://www.discogs.com/label/1921334-Under-No-King-Records',
        ]);

        Label::create([
            'name'    => 'Voodoo Projects',
            'logo'    => config('app.url') . '/images/labels/voodoo-projects.jpg',
            'discogs' => 'https://www.discogs.com/label/1733524-VOODOO-PROJECTS',
        ]);

        Label::create([
            'name'    => 'Wahwah',
            'logo'    => config('app.url') . '/images/labels/wahwah.jpg',
            'discogs' => 'https://www.discogs.com/label/111324-WahWah',
        ]);

        Label::create([
            'name'    => 'We Are Acid Family',
            'logo'    => config('app.url') . '/images/labels/we-are-acid-family.jpg',
            'discogs' => 'https://www.discogs.com/label/2437465-SUF-Vs-Flatlife',
        ]);

        Label::create([
            'name'    => 'XPDIGIFLEX',
            'logo'    => config('app.url') . '/images/labels/xpdigiflex.jpg',
            'discogs' => 'https://www.discogs.com/label/95860-XPDIGIFLEXREC',
        ]);

        Label::create([
            'name'    => 'Yolk',
            'logo'    => config('app.url') . '/images/labels/yolk.jpg',
            'discogs' => 'https://www.discogs.com/label/7272-Yolk',
        ]);
    }
}
