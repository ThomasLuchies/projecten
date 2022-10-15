package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.ListAvailableMoves.ListAvailableBischopMoves;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashSet;

public class Bischop extends Piece
{
    public Bischop(Color color, Board board)
    {
        super(color, board);
    }

    @Override
    public HashSet<Coords> availableMoves(State state, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        ListAvailableBischopMoves availableBischopMoves = new ListAvailableBischopMoves();
        var moves = availableBischopMoves.list(getBoard(), location);
        removeMovesThatCausesChecks(state, location, moves);
        return moves;
    }
}