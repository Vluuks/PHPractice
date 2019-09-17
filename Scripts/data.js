/* 
    Represents the data/database. Obviously fake, who sells cards for 300 euros?
*/
let itemList = [
    {   
        id: 1,
        name: 'Knoepen Feest',
        description: 'Deze kussens houden wel van een feestje! Perfect voor een vrolijke verjaardag.',
        image: 'Images/knoeps.png',
        category: "knoeps",

        price: 2.50,
        inventory: 2,
        tags: ["kaart", "schattig", "verjaardag", "zwart-wit"],
        onSale: true
    },

    // {
    //     id: 2,
    //     name: 'Tim Meijer',
    //     description: 'Dit is beslist de leukste jongen die er is. Hij is niet alleen knap en gezellig, maar ook galant, grappig, zorgzaam en ontzettend lief.',
    //     image: 'Images/tim.png',
    //     category: "knoeps",
        
    //     price: 100000000000,
    //     inventory: 0,
    //     tags: ["knap", "lief", "knuffelbaar", "mooi", "warm", "slim", "grappig", "gul"],
    //     onSale: false
    // },

    {
        id: 3,
        name: 'Pissenbedden',
        description: "Een ansichtkaart met twee pissenbedden erop. Echt lief! ",
        image: 'Images/pissebedden.png',
        category: "nature",
        
        price: 300,
        inventory: 1,
        tags: ["insect", "kaart", "kleur"],
        onSale: false
    },

    {
        id: 4,
        name: 'Boeket',
        description: 'Iets met bloemen ofzo.',
        image: 'Images/boeket.png',
        category: "nature",
        
        price: 10,
        inventory: 0,
        tags: ["kaart", "bloemen", "zwart-wit"],
        onSale: false
    },

    {
        id: 5,
        name: 'Pannenkoekenplant',
        description: 'Deze plant is vet hip, maar niet zonder reden. Zie die ronde bladeren, de elegante stengels, de wetenschap dat je de kleine versies van deze plant poffertjes kan noemen...',
        image: 'Images/pannenkoek.png',
        category: "nature",
        
        price: 10,
        inventory: 1,
        tags: ["kaart", "plant", "kleur"],
        onSale: false
    },

    {
        id: 6,
        name: 'Pannenkoekenplant',
        description: 'Deze plant is vet hip, maar niet zonder reden. Zie die ronde bladeren, de elegante stengels, de wetenschap dat je de kleine versies van deze plant poffertjes kan noemen...',
        image: 'Images/pannenkoek2.png',
        category: "nature",
        
        price: 10,
        inventory: 1,
        tags: ["kaart", "plant", "kleur"],
        onSale: false
    },

    {
        id: 7,
        name: 'Knoepen Keuken',
        description: "Hmm, lekker! Op deze leuke kaart wordt flink gefrituurd en gekookt, met heerlijke kroketten en ravioli\'s tot gevolg",
        image: 'Images/knoeps2.png',
        category: "knoeps",
        
        price: 10,
        inventory: 100,
        tags: ["kaart", "schattig", "zwart-wit"],
        onSale: false
    },

    {
        id: 8,
        name: 'Hangende Planten',
        description: 'Hang in there! Met deze vrolijke pothos-planten vrolijk je iedereen weer op.',
        image: 'Images/planten.png',
        category: "nature",
        
        price: 120,
        inventory: 40,
        tags: ["kaart", "plant", "kleur"],
        onSale: false
    },
];


let projectList = [
    {
        id: 1,
        name: "Guild Wars 2 Pocket Raptor",
        category: "programming",
        description: "..................",
        image: "Projects/gw2.png",
        tags: ["d3.js", "guild wars 2", "dashboard", "visualization"]
    },

    {
        id: 2,
        name: "Android & Java basics",
        category: "academic",
        description: "..................",
        image: "Projects/android.png",
        tags: ["android", "java", "education", "novice programmers", "minor programmeren"]
    },

    {
        id: 3,
        name: "The influence of visual presentation of code on novice programmers’ reading behaviour and comprehension",
        category: "academic",
        description: "My master thesis, investigating the reading behaviour of novice programmers. While a lot of attention is given to writing code, reading is sometimes overlooked. I studied both reading patterns and comprehension with the help of eye tracking, and found that the visual presentation of code greatly impacted the way novices move their gaze over the code.",
        image: "Projects/scriptie.png",
        tags: ["java", "education", "novice programmers", "research"]
    }
];