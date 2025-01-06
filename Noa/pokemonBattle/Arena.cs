using System;
using System.Reflection.Metadata.Ecma335;
using System.Runtime.CompilerServices;
using System.Security.Cryptography.X509Certificates;

namespace Pokebattle;

class Arena
{
    private static int battleCount;
    private static int roundCount;

    public List<Trainer> createTrainer()
    {
        //Give trainers their name
        Battle battle = new Battle();
        int amountTrainers = 2;
        List<String> trainerNames = new List<String>();
        for (int i = 1; i < amountTrainers + 1; i++)
        {
            Console.WriteLine("Give a name to trainer" + i);
            String name = Console.ReadLine();
            trainerNames.Add(name);
        }
        List<Trainer> trainersClass = battle.createTrainerClass(trainerNames);
        return trainersClass;
    }

    public void startBattle(List<Trainer> trainersClass)
    {
        battleCount++;
        Battle battle = new Battle();
        battle.round(trainersClass);
        Console.WriteLine("Rounds played in totaal " + roundCount);
    }

    public void startRound(int round)
    {
        roundCount++;
        Console.WriteLine("Round " + round);
    }

    public static int battleAmount()
    {
        return battleCount;
    }

    public static int roundAmount()
    {
        return roundCount;
    }
}