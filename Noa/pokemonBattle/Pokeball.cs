using System;
using System.Reflection.Metadata.Ecma335;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;

namespace Pokebattle;
//Pokeball class
sealed class Pokeball
{
    private Pokemon pokemon;
    private bool isFull = true;

    public Pokeball(Pokemon pokemon)
    {
        this.pokemon = pokemon;
    }

    public Pokemon openPokeball(Pokeball thrownPokeball)
    {
        isFull = false;
        Pokemon pokemonFromBall = thrownPokeball.pokemon;
        string name = pokemonFromBall.getnickName();
        Console.WriteLine("Pokeball opens! release " + name);
        this.pokemon = null;

        return pokemonFromBall;
    }

    public void closePokeball()
    { 
        isFull = true;
        string name = this.pokemon.getnickName();
        Console.WriteLine(name + " returns to the pokeball");
        this.pokemon = null;
    }
}