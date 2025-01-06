using System;
using System.Reflection.Metadata.Ecma335;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;

namespace Pokebattle;
//Trainer class
class Trainer
{
    public readonly string name;
    private int amountBelt;
    public List<Pokeball> belt;
    private int index {  get; set; }

    public Trainer(string name, List<Pokeball> belt)
    {
        this.name = name;
        this.amountBelt = 6;
        this.belt = beltContent();
    }

    public List<Pokeball> beltContent()
    {
        List<Pokeball> beltContent = new List<Pokeball>();
        Charmander charmander = new Charmander("Charmander", EnergyTypes.fire, EnergyTypes.water);
        Squirtle squirtle = new Squirtle("Squirtle", EnergyTypes.water, EnergyTypes.grass);
        Bulbasaur bulbasaur = new Bulbasaur("Bulbasaur", EnergyTypes.grass, EnergyTypes.fire);
        Pokemon[] poke = { charmander, squirtle, bulbasaur };
        List<Pokemon> pokemon = new List<Pokemon>(poke);
        for (int i = 0; i < amountBelt/3; i++)
        {
            for (int x = 0; x < amountBelt/2; x++)
            {
                Pokeball pokeball = new Pokeball(pokemon[x]);
                beltContent.Add(pokeball);
            }
        }
        return beltContent;
    }

    public Pokemon throwPokeball()
    {
        var random = new Random();
        Charmander charmander = new Charmander("Charmander", EnergyTypes.fire, EnergyTypes.water);
        Pokeball pokeball = new Pokeball(charmander);
        index = random.Next(this.belt.Count);
        Pokeball thrownPokeball = this.belt[index];
        Pokemon pokemonFromBall = pokeball.openPokeball(thrownPokeball);
        return pokemonFromBall;
    }

    public void returnPokemon(Pokemon pokemonOutBall)
    {
        Pokeball pokeball = new Pokeball(pokemonOutBall);
        this.belt.RemoveAt(index);
        pokeball.closePokeball();
    }
}