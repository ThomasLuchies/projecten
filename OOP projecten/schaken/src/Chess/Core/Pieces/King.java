package Chess.Core.Pieces;

import Chess.Core.*;
import Chess.Core.Usecases.ListAvailableMoves.ListAvailableKingMoves;
import Chess.Core.Usecases.LocateKing.LocateKing;

import java.util.HashSet;

// TODO (BUGS)
//  - CanCastle geeft true terug in de volgende situatie:
//  +-------+-------+-------+-------+-------+-------+-------+-------+
//  |       |       |       |       |       |       |       |       |
//  |  (R)  |  (N)  |       |   Q   |  (K)  |  (B)  |  (N)  |  (R)  |
//  |       |       |       |       |       |       |       |       |
//  +-------+-------+-------+-------+-------+-------+-------+-------+
//  |       |       |       |       |       |       |       |       |
//  |  (P)  |       |  (P)  |  (P)  |  (P)  |  (P)  |  (P)  |       |
//  |       |       |       |       |       |       |       |       |
//  +-------+-------+-------+-------+-------+-------+-------+-------+

public class King extends Piece
{
    public King(Color color, Board board)
    {
        super(color, board);
    }

    @Override
    public void move(State state, Coords location, Coords destination) throws MoveNotPossible, Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        if(canCastle(location, destination))
        {
            castle(state, location, destination);
            setMoves(getMoves() + 1);
        }
        else
            super.move(state, location, destination);
    }

    @Override
    public HashSet<Coords> availableMoves(State state, Coords location) throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var moves = new ListAvailableKingMoves().list(getBoard(), location);
        removeMovesThatCausesChecks(state, location, moves);
        return moves;
    }

    private void castle(State state, Coords location, Coords destination) throws Field.NoPieceAvailable, Board.FieldNotFound, MoveNotPossible, LocateKing.KingNotFound
    {
        var unmovedRooks = ListAvailableKingMoves.getUnmovedRooks(getBoard(), getColor());
        if(availableMoves(state, location).contains(destination))
        {
            for(var rook : unmovedRooks.entrySet())
            {
                if(rook.getKey().getMoves() == 0)
                {
                    if (destination.x() - rook.getValue().x() == -1)
                    {
                        getBoard().setPiece(new Coords(rook.getValue().x() - 2, rook.getValue().y()), rook.getKey());
                        getBoard().setPiece(destination, this);
                        getBoard().removePiece(new Coords(8, rook.getValue().y()));
                        getBoard().removePiece(location);
                    }
                    else if (destination.x() - rook.getValue().x() == 2)
                    {
                        getBoard().setPiece(new Coords(rook.getValue().x() + 3, rook.getValue().y()), rook.getKey());
                        getBoard().setPiece(destination, this);
                        getBoard().removePiece(new Coords(1, rook.getValue().y()));
                        getBoard().removePiece(location);
                    }
                }
            }
        }
        else
        {
            throw new MoveNotPossible();
        }
    }

    private boolean canCastle(Coords location, Coords destination) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        var possibleKingMoves = new ListAvailableKingMoves().list(getBoard(), location);
        var unMovedRooks = ListAvailableKingMoves.getUnmovedRooks(getBoard(), getColor()).size();
        return unMovedRooks > 0 && getMoves() == 0 && possibleKingMoves.contains(destination);
    }
}