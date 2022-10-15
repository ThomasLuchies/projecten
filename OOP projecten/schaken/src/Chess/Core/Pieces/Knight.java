package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.ListAvailableMoves.ListAvailableKnightMoves;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashSet;

public class Knight extends Piece
{
    public Knight(Color color, Board board)
    {
        super(color, board);
    }

    @Override
    public HashSet<Coords> availableMoves(State state, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var moves = new ListAvailableKnightMoves().list(getBoard(), location);
        removeMovesThatCausesChecks(state, location, moves);
        return moves;
    }
}