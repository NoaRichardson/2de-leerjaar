using System;
using System.Reflection.Metadata.Ecma335;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;

namespace Pokebattle;

abstract class Pokemon
{

    private string nickName;
    private EnergyTypes strength;
    private EnergyTypes weakness;

    public Pokemon(string nickName, EnergyTypes strength, EnergyTypes weakness)
    {
        this.nickName = nickName;
        this.strength = strength;
        this.weakness = weakness;
    }

    public abstract void battleCry();

    public string getnickName()
    {
        return nickName;
    }

    public void setName(string newnickName)
    {
        this.nickName = newnickName;
    }

    public EnergyTypes getStrength()
    {
        return strength;
    }

    public EnergyTypes getWeakness()
    {
        return weakness;
    }
}

class Charmander : Pokemon
{

    public Charmander(string nickName, EnergyTypes strength, EnergyTypes weakness) : base(nickName, strength, weakness)
    {

    }

    public override void battleCry()
    {
        int amountBattleCry = 10;
        for (int i = 0; i < amountBattleCry; i++)
        {
            Console.WriteLine(this.getnickName() + "!!!");
        }
    }
}

class Squirtle : Pokemon
{
    public Squirtle(string nickName, EnergyTypes strength, EnergyTypes weakness) : base(nickName, strength, weakness)
    {

    }

    public override void battleCry()
    {
        int amountBattleCry = 10;
        for (int i = 0; i < amountBattleCry; i++)
        {
            Console.WriteLine(this.getnickName() + "!!!");
        }
    }
}

class Bulbasaur : Pokemon
{
    public Bulbasaur(string nickName, EnergyTypes strength, EnergyTypes weakness) : base(nickName, strength, weakness)
    {

    }

    public override void battleCry()
    {
        int amountBattleCry = 10;
        for (int i = 0; i < amountBattleCry; i++)
        {
            Console.WriteLine(this.getnickName() + "!!!");
        }
    }
}