package Chess.Core.StateAnalysers;

import Chess.Core.*;
import Chess.Core.Pieces.*;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import java.util.HashSet;

import static org.junit.jupiter.api.Assertions.assertEquals;
import static org.junit.jupiter.api.Assertions.assertTrue;

public class CheckAnalyserTests
{
    private CheckAnalyser analyser;

    @BeforeEach
    public void beforeEach()
    {
        analyser = new CheckAnalyser();
    }

    @Test
    public void returnsCheckStateWhenInCheck() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        var king = new King(Color.white, board);
        var rook = new Rook(Color.black, board);
        board.setPiece(new Coords(1,1), king);
        board.setPiece(new Coords(1,8), rook);
        assertEquals(State.check, analyser.analyse(State.active, board, Color.white));
    }

    @Test
    public void returnsCurrentStateWhenNotInCheck() throws Board.FieldNotFound, LocateKing.KingNotFound, Field.NoPieceAvailable
    {
        var board = new Board();
        board.reset((pawn, location) -> {});
        assertEquals(State.active, analyser.analyse(State.active, board, Color.black));
    }

    @Test
    public void isNotInCheckWhenQueenProtectingKingStraight() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var board = new Board();
        board.setPiece(new Coords(5,8), new King(Color.white, board));
        board.setPiece(new Coords(4,8), new Queen(Color.white, board));
        board.setPiece(new Coords(3,8), new Queen(Color.black, board));
        assertEquals(State.active, analyser.analyse(State.active, board, Color.white));
    }

    @Test
    public void isNotInCheckWhenQueenProtectingKingDiagonally() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var board = new Board();
        board.setPiece(new Coords(1,8), new King(Color.white, board));
        board.setPiece(new Coords(2,7), new Queen(Color.white, board));
        board.setPiece(new Coords(3,6), new Queen(Color.black, board));
        assertEquals(State.active, analyser.analyse(State.active, board, Color.white));
    }
}