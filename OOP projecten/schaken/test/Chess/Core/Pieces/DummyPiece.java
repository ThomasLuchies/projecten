package Chess.Core.Pieces;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.State;

import java.util.HashSet;

public class DummyPiece extends Piece
{
    public DummyPiece(Color color)
    {
        super(color, new Board());
    }

    @Override
    public void move(State state, Coords location, Coords destination)
    {
    }

    @Override
    public HashSet<Coords> availableMoves(State state, Coords location)
    {
        return null;
    }
}